<template>
  <b-card>
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
                <form @submit.prevent="searchDateFrom">
                  <label for=""></label>
                  <div class="input-group">
                    <input type="date" class="form-control hidden" />
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

                <!-- DOWNLOAD -->
              <b-col md="4">
                <div class="input-group-append">
                    <div style="margin-top:15px">
                                      <a href="#" class="btn btn-primary" @click="download_table_as_csv('table_id');">Export</a>
</div>
                    </div>
              </b-col>



              <!-- <b-col md="4">
                <a @click="downloadFile()">
                  <span class="glyphicon glyphicon-download"></span>
                  Download list
                </a>
              </b-col> -->
            </b-row>

            <table id="table_id" class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Date</th>
                  <th>File Ref</th>
                  <th>Client</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody v-if="matters.length > 0">
                <tr
                  class="text-center"
                  v-for="(matter, key) in matters"
                  :key="key"
                >
                  <td>{{ matter.id }}</td>
                  <td>{{ matter.created_at }}</td>
                  <td>{{ matter.file_ref }}</td>
                  <td>{{ matter.client_company }}</td>
                  <td>{{ matter.status }}</td>
                  <td>
                    <router-link
                      :to="{ name: 'edit-matter', params: { id: matter.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      type="button"
                      @click="deleteMatter(matter.id)"
                      class="btn btn-danger"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Matter Found.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
    <br />
    <datatable></datatable>
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
import axios from "axios";
import DataTable from "vue-materialize-datatable";

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
  data() {
    return {
      search_client: "",
      search_file_ref: "",
      search_file_status: "",
      search_date_from: "",
      matters: []
    };
  },
  mounted() {
    this.getMatters();


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
    $(document).ready( function () {
    $.noConflict();
    $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "axios": "/api/auth/matter",
        "columns": [
            { "data" : "id" },
            { "data" : "date" },
            { "data" : "file_ref" },

        ]
    })
} );
  },
  methods: {
    async getMatters() {
      await this.axios
        .get("/api/auth/matter")
        .then((response) => {
          this.matters = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.matters = [];
        });
    },
    downloadFile() {
      this.axios
        .get("/api/auth/matter", { responseType: "arraybuffer" })
        .then((response) => {
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement("a");
          fileLink.href = fileURL;
          fileLink.setAttribute("download", "test.xlsx");
          document.body.appendChild(fileLink);
          fileLink.click();
        });
    },
    deleteMatter(id) {
      if (confirm("Are you sure to delete this Matter ?")) {
        this.axios
          .delete(`/api/auth/matter/${id}`)
          .then((response) => {
            this.getMatters();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    searchClient() {
      axios
        .get("/api/auth/matter?search_client=" + this.search_client)
        .then((response) => (this.matters = response.data));
    },
    searchFileRef() {
      axios
        .get("/api/auth/matter?search_file_ref=" + this.search_file_ref)
        .then((response) => (this.matters = response.data));
    },
    searchFileStatus() {
      axios
        .get("/api/auth/matter?search_file_status=" + this.search_file_status)
        .then((response) => (this.matters = response.data));
    },
    searchDateFrom() {
      axios
        .get("/api/auth/matter?search_date_from=" + this.search_date_from)
        .then((response) => (this.matters = response.data));
    },
    downloadFile() {
  axios.get('/api/auth/matter' + '/testpdf',
       {responseType: 'arraybuffer'})
   .then(response => {
        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
        var fileLink = document.createElement('a');
        fileLink.href = fileURL;
        fileLink.setAttribute('download', 'test.xlsx');
       document.body.appendChild(fileLink);
       fileLink.click();
    })
},
// Quick and simple export target #table_id into a csv
download_table_as_csv(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            // Clean innertext to remove multiple spaces and jumpline (break csv)
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'export_' + table_id + '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

  }
};
</script>
<style lang="scss">
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
