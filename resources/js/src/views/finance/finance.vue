<template>
  <b-card>

<b-row>
        <b-col md="12" class="text-right">
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="primary"
            :to="{ path: '/apps/invoice/add' }"
          >
            <feather-icon icon="PlusIcon" class="mr-50" />
            Add New Payment
          </b-button>
        </b-col>
      </b-row>

    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table">
                        <!-- SERACH CLIENT -->
                        <b-row class="mb-4">
                        <b-col md="4">
                        <form @submit.prevent="searchClient">
                            <label for="">Choose Client:</label>
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
                <!-- SEARCH PAYMENT METHOD -->
                    <b-col md="4">
                        <form @submit.prevent="searchPaymentMethod">
                            <label for="">Choose Payment Method:</label>
                    <div class="input-group">
                        <!-- <input
                            v-model="search_payment_method"
                            type="text"
                            placeholder="Search Payment Method"
                            class="form-control"
                        /> -->
                        <select class="form-control" v-model="search_payment_method">
                            <option class="disabled" value="">Choose Payment Method</option>
                            <option value="Bank Account">Bank Account</option>
                            <option value="Paypal">Paypal</option>
                            <option value="UPI Transfer">UPI Transfer</option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </b-col>



                <!-- SEARCH DATE FROM -->
                <b-col md="4">
                        <form @submit.prevent="searchDateFrom">
                            <label for="">Pick Date:</label>
                    <div class="input-group">
                        <input
                            v-model="search_date_from"
                            type="date"
                            placeholder="Search Date"
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
                    <div class="input-group">

                        <input
                            type="date"
                            class="form-control hidden"
                        />
                        <div class="input-group-append">
                            <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="primary"
            type="submit"
          >
            <i class="fa-solid fa-arrow-rotate-left"></i>
            Reset
          </b-button>
                        </div>
                    </div>
                </form>
                </b-col>



                        </b-row>


                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Payment Method</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody v-if="invoices.length > 0">
                                <tr class="text-center" v-for="(invoice,key) in invoices" :key="key">
                                    <td>{{ invoice.id }}</td>
                                    <td>{{ invoice.created_at }}</td>
                                    <td>{{ invoice.invoice_to }}</td>
                                    <td>{{ invoice.payment_method }}</td>
                                    <td>
                                        <router-link :to='{name:"apps-invoice-edit",params:{id:invoice.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteInvoice(invoice.id)" class="btn btn-danger">Delete</button>
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
    <br />
    <br />
    <br />


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
  BCol
} from "bootstrap-vue";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import { VueGoodTable } from "vue-good-table";
import vSelect from "vue-select";
import store from "@/store/index";
import axios from 'axios';

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
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent,
    vSelect
  },
  data(){
        return {
            search_client: "",
            search_payment_method: "",
            search_file_status: "",
            search_date_from: "",
            invoices:[]
        }
    },
    mounted(){
        this.getInvoices()
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
      async getInvoices(){
            await this.axios.get('/api/auth/invoice').then(response=>{
                this.invoices = response.data
            }).catch(error=>{
                console.log(error)
                this.invoices = []
            })
        },
        deleteInvoice(id){
            if(confirm("Are you sure to delete this Invoice ?")){
                this.axios.delete(`/api/auth/invoice/${id}`).then(response=>{
                    this.getInvoices()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
        searchClient(){
            axios.get('/api/auth/invoice?search_client=' + this.search_client)
            .then(response => this.invoices = response.data)

        },
        searchDateFrom(){
            axios.get('/api/auth/invoice?search_date_from=' + this.search_date_from)
            .then(response => this.invoices = response.data)

        },
        searchPaymentMethod(){
            axios.get('/api/auth/invoice?search_payment_method=' + this.search_payment_method)
            .then(response => this.invoices = response.data)

        },
  },

};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
