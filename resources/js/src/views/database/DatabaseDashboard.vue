<template>
  <b-card>
    <b-breadcrumb :items="items" />
    <div class="custom-search">
      <!-- advance search input -->
      <b-row>
        <b-col md="12" class="text-right">
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="primary"
            :to="{ path: '/database/new-party' }"
          >
            <feather-icon icon="PlusIcon" class="mr-50" />
            Add Party
          </b-button>
        </b-col>
      </b-row>
      <br />
      <b-row>
        <b-col md="4">
          <b-form-group>
            <label>Fullname</label>
            <b-form-input id="basicInput" placeholder="Enter Fullname" />
          </b-form-group>
        </b-col>
        <b-col md="4">
          <b-form-group>
            <label>Company Name</label>
            <b-form-input id="basicInput" placeholder="Enter Company Name" />
          </b-form-group>
        </b-col>
        <b-col md="4">
          <b-form-group>
            <label>Role</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="role"
              placeholder="Choose Role"
            />
          </b-form-group>
        </b-col>
        <b-col md="4">
          <b-form-group>
            <label>Choose Date From:</label>
            <b-form-datepicker
              id="example-datepicker"
              v-model="value"
              class="mb-1"
            />
          </b-form-group>
        </b-col>
        <b-col md="4">
          <b-form-group>
            <label>Choose Date To:</label>
            <b-form-datepicker
              id="example-datepicker"
              v-model="value"
              class="mb-1"
            />
          </b-form-group>
        </b-col>
      </b-row>
    </div>
    <br />
    <br />
    <br />

    <!-- table -->
    <vue-good-table
      :columns="columns"
      :rows="rows"
      :rtl="direction"
      :search-options="{
        enabled: true,
        externalQuery: searchTerm
      }"
      :pagination-options="{
        enabled: true,
        perPage: pageLength
      }"
      theme="my-theme"
      @on-row-click="onRowClick"
    >
      <template slot="table-row" slot-scope="props">
        <span v-if="props.column.field === 'fullName'" class="text-nowrap">
          <span>{{ props.row.fullName }}</span>
        </span>

        <!-- Column: Status -->
        <span v-else-if="props.column.field === 'status'">
          <b-badge :variant="statusVariant(props.row.status)">
            {{ props.row.status }}
          </b-badge>
        </span>

        <!-- Column: Action -->
        <span v-else-if="props.column.field === 'action'">
          <span>
            <b-dropdown
              variant="link"
              toggle-class="text-decoration-none"
              no-caret
            >
              <template v-slot:button-content>
                <feather-icon
                  icon="MoreVerticalIcon"
                  size="16"
                  class="text-body align-middle mr-25"
                />
              </template>
              <b-dropdown-item>
                <feather-icon icon="EyeIcon" class="mr-50" />
                <span>View</span>
              </b-dropdown-item>
              <b-dropdown-item>
                <feather-icon icon="Edit2Icon" class="mr-50" />
                <span>Edit</span>
              </b-dropdown-item>
            </b-dropdown>
          </span>
        </span>
        <span v-else>
          {{ props.formattedRow[props.column.field] }}
        </span>
      </template>

      <!-- pagination -->
      <template slot="pagination-bottom" slot-scope="props">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="d-flex align-items-center mb-0 mt-1">
            <span class="text-nowrap"> Showing 1 to </span>
            <b-form-select
              v-model="pageLength"
              :options="['3', '5', '10']"
              class="mx-1"
              @input="
                (value) => props.perPageChanged({ currentPerPage: value })
              "
            />
            <span class="text-nowrap"> of {{ props.total }} entries </span>
          </div>
          <div>
            <b-pagination
              :value="1"
              :total-rows="props.total"
              :per-page="pageLength"
              first-number
              last-number
              align="right"
              prev-class="prev-item"
              next-class="next-item"
              class="mt-1 mb-0"
              @input="(value) => props.pageChanged({ currentPage: value })"
            >
              <template #prev-text>
                <feather-icon icon="ChevronLeftIcon" size="18" />
              </template>
              <template #next-text>
                <feather-icon icon="ChevronRightIcon" size="18" />
              </template>
            </b-pagination>
          </div>
        </div>
      </template>
    </vue-good-table>
  </b-card>
</template>

<script>
import {
  BButton,
  BBadge,
  BBreadcrumb,
  BDropdown,
  BDropdownItem,
  BCard,
  BCardText,
  BPagination,
  BFormGroup,
  BFormInput,
  BFormSelect,
  BFormDatepicker,
  BRow,
  BCol
} from "bootstrap-vue";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import { VueGoodTable } from "vue-good-table";
import vSelect from "vue-select";
import store from "@/store/index";

export default {
  components: {
    BBadge,
    BButton,
    BBreadcrumb,
    BCard,
    BCardText,
    BDropdown,
    BDropdownItem,
    BFormDatepicker,
    VueGoodTable,
    BPagination,
    BFormGroup,
    BFormInput,
    BFormSelect,
    BRow,
    BCol,
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent,
    vSelect
  },
  data() {
    return {
      client: [{ title: "Louis Ling" }, { title: "Yi Leong" }],
      file_ref: [
        { title: "2020.GP.5163.LKH(AN)" },
        { title: "2021.SH.5164.LKH(AN)" }
      ],
      role: [
        { title: "Vendor" },
        { title: "Purchaser" },
        { title: "Developer" },
        { title: "Borrower" }
      ],
      pageLength: 5,
      dir: false,
      columns: [
        {
          label: "No",
          field: "id"
        },
        {
          label: "Fullname",
          field: "fullName"
        },
        {
          label: "Company Name",
          field: "company_name"
        },
        {
          label: "Role",
          field: "role"
        },
        {
          label: "Register Date",
          field: "date"
        },
        {
          label: "Action",
          field: "action"
        }
      ],
      rows: [],
      searchTerm: "",
      status: [
        {
          1: "Current",
          2: "Professional",
          3: "Rejected",
          4: "Resigned",
          5: "Applied"
        },
        {
          1: "light-primary",
          2: "light-success",
          3: "light-danger",
          4: "light-warning",
          5: "light-info"
        }
      ]
    };
  },
  computed: {
    statusVariant() {
      const statusColor = {
        /* eslint-disable key-spacing */
        Current: "light-primary",
        Professional: "light-success",
        Rejected: "light-danger",
        Resigned: "light-warning",
        Applied: "light-info"
        /* eslint-enable key-spacing */
      };

      return (status) => statusColor[status];
    },
    direction() {
      if (store.state.appConfig.isRTL) {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.dir = true;
        return this.dir;
      }
      // eslint-disable-next-line vue/no-side-effects-in-computed-properties
      this.dir = false;
      return this.dir;
    }
  },
  created() {
    this.$http.get("/api/auth/database").then((res) => {
      this.rows = res.data;
    });
  },
  methods: {
    advanceSearch(val) {
      this.searchTerm = val;
    },
    onRowClick(params) {
      this.$toast({
        component: ToastificationContent,
        props: {
          title: `Hello user! You have clicked on row ${params.row.id}`,
          icon: "UserIcon",
          variant: "success"
        }
      });
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>