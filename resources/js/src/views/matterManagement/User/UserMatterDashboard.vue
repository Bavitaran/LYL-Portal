<template>
  <b-card>
    <br />
    <b-tabs>
      <b-tab active title="Conveyancing">
        <div class="col-12">
          <br />
          <!-- SERACH CLIENT -->
          <b-row class="mb-4">
            <b-col md="3">
              <form @submit.prevent="searchFileRef">
                <label for="">File Reference No. :</label>
                <v-select
                  v-model="fileref"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfileref"
                />
              </form>
            </b-col>
            <!-- SEARCH FILE STATUS -->
            <b-col md="4">
              <form @submit.prevent="searchFileStatus">
                <label for="">File Status:</label>
                <v-select
                  v-model="selectfilestatus"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfilestatus"
                />
              </form>
            </b-col>

            <!-- SEARCH DATE FROM -->
            <b-col md="4">
              <form @submit.prevent="searchPIC">
                <label for="">Person In Charge:</label>
                <v-select
                  v-model="selectpic"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic"
                />
              </form>
            </b-col>

            <!-- RESET -->
            <b-col md="1">
              <form @submit.prevent="getMatters">
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
            <!-- DOWNLOAD -->
            <b-col md="4">
              <div class="input-group-append">
                <div style="margin-top: 15px">
                  <a
                    href="#"
                    class="btn btn-primary"
                    @click="download_table_as_csv('table_id')"
                    >Export</a
                  >
                </div>
              </div>
            </b-col>
          </b-row>

          <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
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
                <tr
                  class="text-center"
                  v-for="(matter, key) in matters"
                  :key="key"
                >
                  <td>{{ matter.id }}</td>
                  <td>{{ matter.created_at }}</td>
                  <td>{{ matter.file_ref }}</td>
                  <td>{{ matter.client_company }}</td>
                  <td>{{ matter.pic }}</td>
                  <td>{{ matter.status }}</td>

                  <td>
                    <router-link
                      :to="{
                        name: 'user-view-matter-convey',
                        params: { id: matter.id }
                      }"
                      ><i class="fa-solid fa-download"></i
                    ></router-link>
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
      </b-tab>
      <b-tab title="Will and Trust">
        <div class="col-12">
          <br />
          <!-- SERACH CLIENT -->
          <b-row class="mb-4">
            <b-col md="3">
              <form @submit.prevent="searchFileRef">
                <label for="">File Reference No. :</label>
                <v-select
                  v-model="fileref"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfileref"
                />
              </form>
            </b-col>
            <!-- SEARCH FILE STATUS -->
            <b-col md="4">
              <form @submit.prevent="searchFileStatus">
                <label for="">File Status:</label>
                <v-select
                  v-model="selectfilestatus"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfilestatus"
                />
              </form>
            </b-col>

            <!-- SEARCH DATE FROM -->
            <b-col md="4">
              <form @submit.prevent="searchPIC">
                <label for="">Person In Charge:</label>
                <v-select
                  v-model="selectpic"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic"
                />
              </form>
            </b-col>

            <!-- RESET -->
            <b-col md="1">
              <form @submit.prevent="getMatters">
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

            <!-- DOWNLOAD -->
            <b-col md="4">
              <div class="input-group-append">
                <div style="margin-top: 15px">
                  <a
                    href="#"
                    class="btn btn-primary"
                    @click="download_table_as_csv('table_id')"
                    >Export</a
                  >
                </div>
              </div>
            </b-col>
          </b-row>
          <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
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
                <tr
                  class="text-center"
                  v-for="(matter, key) in matters"
                  :key="key"
                >
                  <td>{{ matter.id }}</td>
                  <td>{{ matter.created_at }}</td>
                  <td>{{ matter.file_ref }}</td>
                  <td>{{ matter.client_company }}</td>
                  <td>{{ matter.pic }}</td>
                  <td>{{ matter.status }}</td>

                  <td>
                    <router-link
                      :to="{
                        name: 'user-view-matter-will',
                        params: { id: matter.id }
                      }"
                      ><i class="fa-solid fa-download"></i
                    ></router-link>
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
      </b-tab>
      <b-tab title="Probate and Administrator">
        <div class="col-12">
          <br />
          <!-- SERACH CLIENT -->
          <b-row class="mb-4">
            <b-col md="3">
              <form @submit.prevent="searchFileRef">
                <label for="">File Reference No. :</label>
                <v-select
                  v-model="fileref"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfileref"
                />
              </form>
            </b-col>
            <!-- SEARCH FILE STATUS -->
            <b-col md="4">
              <form @submit.prevent="searchFileStatus">
                <label for="">File Status:</label>
                <v-select
                  v-model="selectfilestatus"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfilestatus"
                />
              </form>
            </b-col>

            <!-- SEARCH DATE FROM -->
            <b-col md="4">
              <form @submit.prevent="searchPIC">
                <label for="">Person In Charge:</label>
                <v-select
                  v-model="selectpic"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic"
                />
              </form>
            </b-col>

            <!-- RESET -->
            <b-col md="1">
              <form @submit.prevent="getMatters">
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
            <!-- DOWNLOAD -->
            <b-col md="4">
              <div class="input-group-append">
                <div style="margin-top: 15px">
                  <a
                    href="#"
                    class="btn btn-primary"
                    @click="download_table_as_csv('table_id')"
                    >Export</a
                  >
                </div>
              </div>
            </b-col>
          </b-row>
          <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
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
                <tr
                  class="text-center"
                  v-for="(matter, key) in matters"
                  :key="key"
                >
                  <td>{{ matter.id }}</td>
                  <td>{{ matter.created_at }}</td>
                  <td>{{ matter.file_ref }}</td>
                  <td>{{ matter.client_company }}</td>
                  <td>{{ matter.pic }}</td>
                  <td>{{ matter.status }}</td>

                  <td>
                    <router-link
                      :to="{
                        name: 'user-view-matter-probate',
                        params: { id: matter.id }
                      }"
                      ><i class="fa-solid fa-download"></i
                    ></router-link>
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
      </b-tab>
      <b-tab title="Corporate and Commercial">
        <div class="col-12">
          <br />
          <!-- SERACH CLIENT -->
          <b-row class="mb-4">
            <b-col md="3">
              <form @submit.prevent="searchFileRef">
                <label for="">File Reference No. :</label>
                <v-select
                  v-model="fileref"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfileref"
                />
              </form>
            </b-col>
            <!-- SEARCH FILE STATUS -->
            <b-col md="4">
              <form @submit.prevent="searchFileStatus">
                <label for="">File Status:</label>
                <v-select
                  v-model="selectfilestatus"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfilestatus"
                />
              </form>
            </b-col>

            <!-- SEARCH DATE FROM -->
            <b-col md="4">
              <form @submit.prevent="searchPIC">
                <label for="">Person In Charge:</label>
                <v-select
                  v-model="selectpic"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic"
                />
              </form>
            </b-col>

            <!-- RESET -->
            <b-col md="1">
              <form @submit.prevent="getMatters">
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
            <!-- DOWNLOAD -->
            <b-col md="4">
              <div class="input-group-append">
                <div style="margin-top: 15px">
                  <a
                    href="#"
                    class="btn btn-primary"
                    @click="download_table_as_csv('table_id')"
                    >Export</a
                  >
                </div>
              </div>
            </b-col>
          </b-row>
          <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
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
                <tr
                  class="text-center"
                  v-for="(matter, key) in matters"
                  :key="key"
                >
                  <td>{{ matter.id }}</td>
                  <td>{{ matter.created_at }}</td>
                  <td>{{ matter.file_ref }}</td>
                  <td>{{ matter.client_company }}</td>
                  <td>{{ matter.pic }}</td>
                  <td>{{ matter.status }}</td>

                  <td>
                    <router-link
                      :to="{
                        name: 'user-view-matter-corp',
                        params: { id: matter.id }
                      }"
                      ><i class="fa-solid fa-download"></i
                    ></router-link>
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
      </b-tab>
      <b-tab title="Intellectual Properties">
        <div class="col-12">
          <br />
          <!-- SERACH CLIENT -->
          <b-row class="mb-4">
            <b-col md="3">
              <form @submit.prevent="searchFileRef">
                <label for="">File Reference No. :</label>
                <v-select
                  v-model="fileref"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfileref"
                />
              </form>
            </b-col>
            <!-- SEARCH FILE STATUS -->
            <b-col md="4">
              <form @submit.prevent="searchFileStatus">
                <label for="">File Status:</label>
                <v-select
                  v-model="selectfilestatus"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfilestatus"
                />
              </form>
            </b-col>

            <!-- SEARCH DATE FROM -->
            <b-col md="4">
              <form @submit.prevent="searchPIC">
                <label for="">Person In Charge:</label>
                <v-select
                  v-model="selectpic"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic"
                />
              </form>
            </b-col>

            <!-- RESET -->
            <b-col md="1">
              <form @submit.prevent="getMatters">
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
            <!-- DOWNLOAD -->
            <b-col md="4">
              <div class="input-group-append">
                <div style="margin-top: 15px">
                  <a
                    href="#"
                    class="btn btn-primary"
                    @click="download_table_as_csv('table_id')"
                    >Export</a
                  >
                </div>
              </div>
            </b-col>
          </b-row>
          <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
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
                <tr
                  class="text-center"
                  v-for="(matter, key) in matters"
                  :key="key"
                >
                  <td>{{ matter.id }}</td>
                  <td>{{ matter.created_at }}</td>
                  <td>{{ matter.file_ref }}</td>
                  <td>{{ matter.client_company }}</td>
                  <td>{{ matter.pic }}</td>
                  <td>{{ matter.status }}</td>

                  <td>
                    <router-link
                      :to="{
                        name: 'user-view-matter-intel',
                        params: { id: matter.id }
                      }"
                      ><i class="fa-solid fa-download"></i
                    ></router-link>
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
      </b-tab>
      <b-tab title="Dispute Resolution">
        <div class="col-12">
          <br />
          <!-- SERACH CLIENT -->
          <b-row class="mb-4">
            <b-col md="3">
              <form @submit.prevent="searchFileRef">
                <label for="">File Reference No. :</label>
                <v-select
                  v-model="fileref"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfileref"
                />
              </form>
            </b-col>
            <!-- SEARCH FILE STATUS -->
            <b-col md="4">
              <form @submit.prevent="searchFileStatus">
                <label for="">File Status:</label>
                <v-select
                  v-model="selectfilestatus"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionfilestatus"
                />
              </form>
            </b-col>

            <!-- SEARCH DATE FROM -->
            <b-col md="4">
              <form @submit.prevent="searchPIC">
                <label for="">Person In Charge:</label>
                <v-select
                  v-model="selectpic"
                  :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                  label="title"
                  :options="optionpic"
                />
              </form>
            </b-col>

            <!-- RESET -->
            <b-col md="1">
              <form @submit.prevent="getMatters">
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
            <!-- DOWNLOAD -->
            <b-col md="4">
              <div class="input-group-append">
                <div style="margin-top: 15px">
                  <a
                    href="#"
                    class="btn btn-primary"
                    @click="download_table_as_csv('table_id')"
                    >Export</a
                  >
                </div>
              </div>
            </b-col>
          </b-row>
          <div class="table-responsive">
            <table id="table_id" class="table table-bordered">
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
                <tr
                  class="text-center"
                  v-for="(matter, key) in matters"
                  :key="key"
                >
                  <td>{{ matter.id }}</td>
                  <td>{{ matter.created_at }}</td>
                  <td>{{ matter.file_ref }}</td>
                  <td>{{ matter.client_company }}</td>
                  <td>{{ matter.pic }}</td>
                  <td>{{ matter.status }}</td>

                  <td>
                    <router-link
                      :to="{
                        name: 'user-view-matter-dispute',
                        params: { id: matter.id }
                      }"
                      ><i class="fa-solid fa-download"></i
                    ></router-link>
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
      </b-tab>
    </b-tabs>
    <!-- </div>
    </div> -->
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
  BCol,
  BTabs,
  BTab
} from "bootstrap-vue";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import { VueGoodTable } from "vue-good-table";
import vSelect from "vue-select";
import store from "@/store/index";
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
      fileref: { title: "Select File Reference No." },
      optionfileref: [
        { title: "A1234" },
        { title: "B1234" },
        { title: "C1234" }
      ],
      selectfilestatus: { title: "Select File Status" },
      optionfilestatus: [{ title: "Pending Client" }, { title: "To Do" }],
      selectpic: { title: "Select Person In Charge" },
      optionpic: [{ title: "Person A" }, { title: "Person B" }],
      search_client: "",
      search_file_ref: "",
      search_file_status: "",
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
    downloadFile() {
      axios
        .get("/api/auth/matter" + "/testpdf", { responseType: "arraybuffer" })
        .then((response) => {
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement("a");
          fileLink.href = fileURL;
          fileLink.setAttribute("download", "test.xlsx");
          document.body.appendChild(fileLink);
          fileLink.click();
        });
    },
    // Quick and simple export target #table_id into a csv
    download_table_as_csv(table_id, separator = ",") {
      // Select rows from table_id
      var rows = document.querySelectorAll("table#" + table_id + " tr");
      // Construct csv
      var csv = [];
      for (var i = 0; i < rows.length; i++) {
        var row = [],
          cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) {
          // Clean innertext to remove multiple spaces and jumpline (break csv)
          var data = cols[j].innerText
            .replace(/(\r\n|\n|\r)/gm, "")
            .replace(/(\s\s)/gm, " ");
          // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
          data = data.replace(/"/g, '""');
          // Push escaped string
          row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
      }
      var csv_string = csv.join("\n");
      // Download it
      var filename =
        "export_" + table_id + "_" + new Date().toLocaleDateString() + ".csv";
      var link = document.createElement("a");
      link.style.display = "none";
      link.setAttribute("target", "_blank");
      link.setAttribute(
        "href",
        "data:text/csv;charset=utf-8," + encodeURIComponent(csv_string)
      );
      link.setAttribute("download", filename);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
