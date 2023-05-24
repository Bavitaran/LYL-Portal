<template>
  <b-card>

<b-row>
        <b-col md="12" class="text-right">
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="primary"
            :to="{ path: '/add-matter' }"
          >
            <feather-icon icon="PlusIcon" class="mr-50" />
            Add New Matter
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
                <!-- SEARCH FILE REF -->
                <b-col md="4">
                        <form @submit.prevent="searchFileRef">
                            <label for="">Choose File Ref:</label>
                    <div class="input-group">

                        <input
                            v-model="search_file_ref"
                            type="text"
                            placeholder="Search File Ref"
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
                <!-- SEARCH FILE STATUS -->
                <b-col md="4">
                        <form @submit.prevent="searchFileStatus">
                            <label for="">Choose File Status:</label>
                    <div class="input-group">

                        <input
                            v-model="search_file_status"
                            type="text"
                            placeholder="Search File Status"
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

                <!-- SEARCH DATE FROM -->
                <b-col md="4">
                        <form @submit.prevent="searchDateFrom">
                            <label for="">Choose Date:</label>
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
                        <form @submit.prevent="getMatters">
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
                                    <th>File Ref</th>
                                    <th>Client</th>
                                    <th>Person In Charge(PIC)</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody v-if="matters.length > 0">
                                <tr class="text-center" v-for="(matter,key) in matters" :key="key">
                                    <td>{{ matter.id }}</td>
                                    <td>{{ matter.created_at }}</td>
                                    <td>{{ matter.file_ref }}</td>
                                    <td>{{ matter.client_company }}</td>
                                    <td>{{ matter.pic }}</td>
                                    <td>{{ matter.status }}</td>
                                    <td>
                                        <router-link :to='{name:"edit-matter",params:{id:matter.id}}'><i class="fa-solid fa-pen-to-square"></i></router-link>
                                        <router-link :to='{name:"view-matter",params:{id:matter.id}}'><i class="fa-solid fa-eye"></i></router-link>
                                        <!-- <button type="button" @click="deleteMatter(matter.id)" class="btn btn-danger">Delete</button> -->
                                        <a style="color:#7367f0" @click="deleteMatter(matter.id)"><i class="fa-solid fa-trash-can"></i></a>

                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="7" align="center">No Matter Found.</td>
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
            search_file_ref: "",
            search_file_status: "",
            search_date_from: "",
            matters:[]
        }
    },
    mounted(){
        this.getMatters()
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
      async getMatters(){
            await this.axios.get('/api/auth/matter').then(response=>{
                this.matters = response.data
            }).catch(error=>{
                console.log(error)
                this.matters = []
            })
        },
        deleteMatter(id){
            if(confirm("Are you sure to delete this Matter ?")){
                this.axios.delete(`/api/auth/matter/${id}`).then(response=>{
                    this.getMatters()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
        searchClient(){
            axios.get('/api/auth/matter?search_client=' + this.search_client)
            .then(response => this.matters = response.data)

        },
        searchFileRef(){
            axios.get('/api/auth/matter?search_file_ref=' + this.search_file_ref)
            .then(response => this.matters = response.data)

        },
        searchFileStatus(){
            axios.get('/api/auth/matter?search_file_status=' + this.search_file_status)
            .then(response => this.matters = response.data)

        },
        searchDateFrom(){
            axios.get('/api/auth/matter?search_date_from=' + this.search_date_from)
            .then(response => this.matters = response.data)

        },


  },

};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
