<template>

  <!-- <b-card v-if="invoices.length > 0"
    no-body
  >

    <div class="m-2">

      <b-row>

        <b-col
          cols="12"
          md="6"
          class="d-flex align-items-center justify-content-start mb-1 mb-md-0"
        >
          <label>Entries</label>
          <v-select
            v-model="perPage"
            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
            :options="perPageOptions"
            :clearable="false"
            class="per-page-selector d-inline-block ml-50 mr-1"
          />
          <b-button
            variant="primary"
            :to="{ name: 'apps-invoice-add'}"
          >
            Add Record
          </b-button>
        </b-col>

        <b-col
          cols="12"
          md="6"
        >
          <div class="d-flex align-items-center justify-content-end">
            <b-form-input
              v-model="searchQuery"
              class="d-inline-block mr-1"
              placeholder="Search..."
            />
            <v-select
              v-model="statusFilter"
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              :options="statusOptions"
              class="invoice-filter-select"
              placeholder="Select Status"
            >
              <template #selected-option="{ label }">
                <span class="text-truncate overflow-hidden">
                  {{ label }}
                </span>
              </template>
            </v-select>
          </div>
        </b-col>
      </b-row>

    </div>

    <b-table
      ref="refInvoiceListTable"
      :items="fetchInvoices"
      responsive
      :fields="tableColumns"
      primary-key="id"
      :sort-by.sync="sortBy"
      show-empty
      empty-text="No matching records found"
      :sort-desc.sync="isSortDirDesc"
      class="position-relative"
    >

      <template  #head(invoiceStatus)>
        <feather-icon
          icon="TrendingUpIcon"
          class="mx-auto"
        />
      </template>

      <template #cell(id)="data">
        <b-link

          :to="{ name: 'apps-invoice-preview', params: { id: data.item.id }}"
          class="font-weight-bold"
        >
          #{{ data.value }}
        </b-link>
      </template>

      <template #cell(invoiceStatus)="data">
        <b-avatar
          :id="`invoice-row-${data.item.id}`"
          size="32"
          :variant="`light-${resolveInvoiceStatusVariantAndIcon(data.item.invoiceStatus).variant}`"
        >
          <feather-icon
            :icon="resolveInvoiceStatusVariantAndIcon(data.item.invoiceStatus).icon"
          />
        </b-avatar>
        <b-tooltip
          :target="`invoice-row-${data.item.id}`"
          placement="top"
        >
          <p class="mb-0">
            {{ data.item.invoiceStatus }}
          </p>
          <p class="mb-0">
            Balance: {{ data.item.balance }}
          </p>
          <p class="mb-0">
            Due Date: {{ data.item.dueDate }}
          </p>
        </b-tooltip>
      </template>

      <template #cell(client)="data">
        <b-media vertical-align="center">
          <template #aside>
            <b-avatar
              size="32"
              :src="data.item.avatar"
              :text="avatarText(data.item.client.name)"
              :variant="`light-${resolveClientAvatarVariant(data.item.invoiceStatus)}`"
            />
          </template>
          <span class="font-weight-bold d-block text-nowrap">
            {{ data.item.client.name }}
          </span>
          <small class="text-muted">{{ data.item.client.companyEmail }}</small>
        </b-media>
      </template>

      <template #cell(issuedDate)="data">
        <span class="text-nowrap">
          {{ data.value }}
        </span>
      </template>

      <template #cell(balance)="data">
        <template v-if="data.value === 0">
          <b-badge
            pill
            variant="light-success"
          >
            Paid
          </b-badge>
        </template>
        <template v-else>
          {{ data.value }}
        </template>
      </template>

      <template #cell(actions)="data">

        <div class="text-nowrap">
          <feather-icon
            :id="`invoice-row-${data.item.id}-send-icon`"
            icon="SendIcon"
            class="cursor-pointer"
            size="16"
          />
          <b-tooltip
            title="Send Invoice"
            class="cursor-pointer"
            :target="`invoice-row-${data.item.id}-send-icon`"
          />

          <feather-icon
            :id="`invoice-row-${data.item.id}-preview-icon`"
            icon="EyeIcon"
            size="16"
            class="mx-1"
            @click="$router.push({ name: 'apps-invoice-preview', params: { id: data.item.id }})"
          />
          <b-tooltip
            title="Preview Invoice"
            :target="`invoice-row-${data.item.id}-preview-icon`"
          />

          <b-dropdown
            variant="link"
            toggle-class="p-0"
            no-caret
            :right="$store.state.appConfig.isRTL"
          >

            <template #button-content>
              <feather-icon
                icon="MoreVerticalIcon"
                size="16"
                class="align-middle text-body"
              />
            </template>
            <b-dropdown-item>
              <feather-icon icon="DownloadIcon" />
              <span class="align-middle ml-50">Download</span>
            </b-dropdown-item>
            <b-dropdown-item :to="{ name: 'apps-invoice-edit', params: { id: data.item.id } }">
              <feather-icon icon="EditIcon" />
              <span class="align-middle ml-50">Edit</span>
            </b-dropdown-item>
            <b-dropdown-item>
              <feather-icon icon="TrashIcon" />
              <span class="align-middle ml-50">Delete</span>
            </b-dropdown-item>
            <b-dropdown-item>
              <feather-icon icon="CopyIcon" />
              <span class="align-middle ml-50">Duplicate</span>
            </b-dropdown-item>
          </b-dropdown>
        </div>
      </template>

    </b-table>
    <div class="mx-2 mb-2">
      <b-row>

        <b-col
          cols="12"
          sm="6"
          class="d-flex align-items-center justify-content-center justify-content-sm-start"
        >
          <span class="text-muted">Showing {{ dataMeta.from }} to {{ dataMeta.to }} of {{ dataMeta.of }} entries</span>
        </b-col>

        <b-col
          cols="12"
          sm="6"
          class="d-flex align-items-center justify-content-center justify-content-sm-end"
        >

          <b-pagination
            v-model="currentPage"
            :total-rows="totalInvoices"
            :per-page="perPage"
            first-number
            last-number
            class="mb-0 mt-1 mt-sm-0"
            prev-class="prev-item"
            next-class="next-item"
          >
            <template #prev-text>
              <feather-icon
                icon="ChevronLeftIcon"
                size="18"
              />
            </template>
            <template #next-text>
              <feather-icon
                icon="ChevronRightIcon"
                size="18"
              />
            </template>
          </b-pagination>

        </b-col>

      </b-row>
    </div>
  </b-card> -->
<div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>date</th>
                                    <th>due_date</th>
                                    <th>invoice_to</th>
                                    <th>item</th>
                                    <th>cost</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>description</th>
                                    <th>sales_person</th>
                                    <th>note</th>
                                    <th>payment_method</th>
                                </tr>
                            </thead>
                            <tbody v-if="invoices.length > 0">
                                <tr v-for="(invoice,key) in invoices" :key="key">
                                    <td>{{ invoice.id }}</td>
                                    <td>{{ invoice.date }}</td>
                                    <td>{{ invoice.due_date }}</td>
                                    <td>{{ invoice.invoice_to }}</td>
                                    <td>{{ invoice.item }}</td>
                                    <td>{{ invoice.cost }}</td>
                                    <td>{{ invoice.quantity }}</td>
                                    <td>{{ invoice.price }}</td>
                                    <td>{{ invoice.description }}</td>
                                    <td>{{ invoice.sales_person }}</td>
                                    <td>{{ invoice.note }}</td>
                                    <td>{{ invoice.payment_method }}</td>
                                    <td>
                                        <router-link :to='{name:"apps-invoice-edit",params:{id:invoice.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteInvoice(invoice.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No invoices Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import {
  BCard,
  BRow,
  BCol,
  BFormInput,
  BButton,
  BTable,
  BMedia,
  BAvatar,
  BLink,
  BBadge,
  BDropdown,
  BDropdownItem,
  BPagination,
  BTooltip,
} from 'bootstrap-vue'
import { avatarText } from '@core/utils/filter'
import vSelect from 'vue-select'
import { onUnmounted } from '@vue/composition-api'
import store from '@/store'
import useInvoicesList from './useInvoiceList'

import invoiceStoreModule from '../invoiceStoreModule'

export default {
    name:"invoices",
    data(){
        return {
            invoices:[]
        }
    },
    mounted(){
        this.getInvoices()
    },
    methods:{
        async getInvoices(){
            await this.axios.get('/api/auth/invoice').then(response=>{
                this.invoices = response.data
            }).catch(error=>{
                console.log(error)
                this.invoices = []
            })
        },
        deleteInvoice(id){
            if(confirm("Are you sure to delete this category ?")){
                this.axios.delete(`/api/auth/invoice/${id}`).then(response=>{
                    this.getInvoices()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    },
  components: {
    BCard,
    BRow,
    BCol,
    BFormInput,
    BButton,
    BTable,
    BMedia,
    BAvatar,
    BLink,
    BBadge,
    BDropdown,
    BDropdownItem,
    BPagination,
    BTooltip,

    vSelect,
  },
  setup() {
    const INVOICE_APP_STORE_MODULE_NAME = 'app-invoice'

    // Register module
    if (!store.hasModule(INVOICE_APP_STORE_MODULE_NAME))
      store.registerModule(INVOICE_APP_STORE_MODULE_NAME, invoiceStoreModule)

    // UnRegister on leave
    onUnmounted(() => {
      if (store.hasModule(INVOICE_APP_STORE_MODULE_NAME)) store.unregisterModule(INVOICE_APP_STORE_MODULE_NAME)
    })

    const statusOptions = ['Downloaded', 'Draft', 'Paid', 'Partial Payment', 'Past Due']

    const {
      fetchInvoices,
      tableColumns,
      perPage,
      currentPage,
      totalInvoices,
      dataMeta,
      perPageOptions,
      searchQuery,
      sortBy,
      isSortDirDesc,
      refInvoiceListTable,

      statusFilter,

      refetchData,

      resolveInvoiceStatusVariantAndIcon,
      resolveClientAvatarVariant,
    } = useInvoicesList()

    return {
      fetchInvoices,
      tableColumns,
      perPage,
      currentPage,
      totalInvoices,
      dataMeta,
      perPageOptions,
      searchQuery,
      sortBy,
      isSortDirDesc,
      refInvoiceListTable,

      statusFilter,

      refetchData,

      statusOptions,

      avatarText,
      resolveInvoiceStatusVariantAndIcon,
      resolveClientAvatarVariant,
    }
  },
}
</script>

<style lang="scss" scoped>
.per-page-selector {
  width: 90px;
}

.invoice-filter-select {
  min-width: 190px;

  ::v-deep .vs__selected-options {
    flex-wrap: nowrap;
  }

  ::v-deep .vs__selected {
    width: 100px;
  }
}
</style>

<style lang="scss">
@import '~@core/scss/vue/libs/vue-select.scss';
</style>
