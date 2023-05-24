<template>
  <b-card>
    <b-tabs>
      <b-tab active title="Invoice Quotation">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table">
                <!-- SERACH CLIENT -->
                <b-row class="mb-4">
                  <b-col md="4">
                    <form @submit.prevent="searchClient">
                      <label for="">Official Receipt File Reference No.:</label>
                      <div class="input-group">
                        <input
                          v-model="search_client"
                          type="text"
                          placeholder="Search Client"
                          class="form-control"
                        />
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </b-col>

                  <!-- RESET -->
                  <b-col md="4">
                    <form @submit.prevent="getInvoices">
                      <label for=""></label>
                      <div class="input-group-append">
                        <b-button
                          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                          variant="primary"
                          type="submit"
                        >
                          <i class="fa-solid fa-arrow-rotate-left"></i>
                        </b-button>
                      </div>
                    </form>
                  </b-col>
                </b-row>

                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th>ID</th>
                        <th>File Reference No.</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody v-if="invoices.length > 0">
                      <tr
                        class="text-center"
                        v-for="(invoice, key) in invoices"
                        :key="key"
                      >
                        <td>{{ invoice.id }}</td>
                        <td>{{ invoice.file_ref }}</td>
                        <td>{{ invoice.created_at }}</td>
                        <td>
                          <router-link
                            :to="{
                              name: 'apps-invoice-view-quotation',
                              params: { id: invoice.id }
                            }"
                            ><i class="fa-solid fa-eye"></i
                          ></router-link>
                        </td>
                      </tr>
                    </tbody>
                    <tbody v-else>
                      <tr>
                        <td colspan="5" align="center">No Invoice Found.</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </b-tab>

      <b-tab title="Outstanding Payment">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table">
                <!-- SERACH CLIENT -->
                <b-row class="mb-4">
                  <b-col md="4">
                    <form @submit.prevent="searchClient">
                      <label for="">Official Receipt File Reference No.:</label>
                      <div class="input-group">
                        <input
                          v-model="search_client"
                          type="text"
                          placeholder="Search Client"
                          class="form-control"
                        />
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </b-col>

                  <!-- RESET -->
                  <b-col md="4">
                    <form @submit.prevent="getInvoices">
                      <label for=""></label>
                      <div class="input-group-append">
                        <b-button
                          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                          variant="primary"
                          type="submit"
                        >
                          <i class="fa-solid fa-arrow-rotate-left"></i>
                        </b-button>
                      </div>
                    </form>
                  </b-col>
                </b-row>

                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th>ID</th>
                        <th>File Reference No.</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody v-if="invoices.length > 0">
                      <tr
                        class="text-center"
                        v-for="(invoice, key) in invoices"
                        :key="key"
                      >
                        <td>{{ invoice.id }}</td>
                        <td>{{ invoice.file_ref }}</td>
                        <td>{{ invoice.created_at }}</td>
                        <td>
                          <router-link
                            :to="{
                              name: 'apps-invoice-view-outstanding',
                              params: { id: invoice.id }
                            }"
                            ><i class="fa-solid fa-eye"></i
                          ></router-link>
                        </td>
                      </tr>
                    </tbody>
                    <tbody v-else>
                      <tr>
                        <td colspan="5" align="center">No Invoice Found.</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </b-tab>
    </b-tabs>
  </b-card>
</template>


<script>
import {
  BButton,
  BBadge,
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
  BCol,
  BTabs,
  BTab
} from "bootstrap-vue";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import { VueGoodTable } from "vue-good-table";
import store from "@/store/index";
import vSelect from "vue-select";
import axios from "axios";

export default {
  components: {
    BBadge,
    BButton,
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
    BTabs,
    BTab,

    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent,
    vSelect
  },
  data() {
    return {
      search_client: "",
      search_payment_method: "",
      search_file_status: "",
      search_date_from: "",
      invoices: []
    };
  },
  mounted() {
    this.getInvoices();
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
    this.$http.get("/good-table/advanced-search").then((res) => {
      this.rows = res.data;
    });
  },
  methods: {
    async getInvoices() {
      await this.axios
        .get("/api/auth/invoice")
        .then((response) => {
          this.invoices = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.invoices = [];
        });
    },
    deleteInvoice(id) {
      if (confirm("Are you sure to delete this Invoice ?")) {
        this.axios
          .delete(`/api/auth/invoice/${id}`)
          .then((response) => {
            this.getInvoices();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    searchClient() {
      axios
        .get("/api/auth/invoice?search_client=" + this.search_client)
        .then((response) => (this.invoices = response.data));
    },
    searchDateFrom() {
      axios
        .get("/api/auth/invoice?search_date_from=" + this.search_date_from)
        .then((response) => (this.invoices = response.data));
    },
    searchPaymentMethod() {
      axios
        .get(
          "/api/auth/invoice?search_payment_method=" +
            this.search_payment_method
        )
        .then((response) => (this.invoices = response.data));
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
