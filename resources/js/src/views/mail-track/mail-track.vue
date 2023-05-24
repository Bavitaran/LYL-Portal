<template>
  <b-card>
    <b-row>
      <b-col md="12" class="text-right">
        <!-- <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          variant="primary"
          :to="{ path: '/add-mail-track' }"
        >
          <feather-icon icon="PlusIcon" class="mr-50" />
          New Mail Records 
        </b-button> -->
        <b-dropdown
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          right
          variant="primary"
          text="Add New Mail Records"
        >
          <b-dropdown-item :to="{ path: '/add-mail-track-in' }"
            >Incoming Documents</b-dropdown-item
          >
          <b-dropdown-item :to="{ path: '/add-mail-track-out' }"
            >Outgoing Documents</b-dropdown-item
          >
        </b-dropdown>
      </b-col>
    </b-row>
    <hr />
    <div class="col-12">
      <div class="table">
        <!-- SERACH DATE -->
        <b-row class="mb-4">
          <b-col md="3">
            <form @submit.prevent="searchDate">
              <label for="">Date:</label>
              <div class="input-group">
                <input
                  v-model="search_date"
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

          <!-- SEARCH REF NO -->
          <b-col md="4">
            <form @submit.prevent="searchRefNo">
              <label for="">File Reference No.:</label>
              <div class="input-group">
                <input
                  v-model="search_ref_no"
                  type="text"
                  placeholder="Search File Reference No."
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

          <!-- SEARCH Description -->
          <b-col md="3">
            <form @submit.prevent="searchDescription">
              <label for="">Description:</label>
              <div class="input-group">
                <input
                  v-model="search_description"
                  type="text"
                  placeholder="Search Description"
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
          <b-col md="2">
            <form @submit.prevent="getMails">
              <br />
              <b-button
                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                variant="primary"
                type="submit"
              >
                <i class="fa-solid fa-arrow-rotate-left"></i>
                Reset
              </b-button>
            </form>
          </b-col>
        </b-row>

        <b-tabs pills>
          <b-tab title="Incoming" active>
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Date</th>
                  <th>File Ref</th>
                  <th>Description / Type of Document</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody v-if="mails.length > 0">
                <tr class="text-center" v-for="(mail, key) in mails" :key="key">
                  <td>{{ mail.id }}</td>
                  <td>{{ mail.date }}</td>
                  <td>{{ mail.ref_no }}</td>
                  <td>{{ mail.description }}</td>
                  <td>
                    <router-link
                      :to="{ name: 'edit-mail-in', params: { id: mail.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      type="button"
                      @click="deleteMail(mail.id)"
                      class="btn btn-danger"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Mail Found.</td>
                </tr>
              </tbody>
            </table>
          </b-tab>
          <b-tab title="Outgoing">
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Date</th>
                  <th>File Ref</th>
                  <th>Description / Type of Document</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody v-if="mails.length > 0">
                <tr class="text-center" v-for="(mail, key) in mails" :key="key">
                  <td>{{ mail.id }}</td>
                  <td>{{ mail.date }}</td>
                  <td>{{ mail.ref_no }}</td>
                  <td>{{ mail.description }}</td>
                  <td>
                    <router-link
                      :to="{ name: 'edit-mail-out', params: { id: mail.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      type="button"
                      @click="deleteMail(mail.id)"
                      class="btn btn-danger"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Mail Found.</td>
                </tr>
              </tbody>
            </table>
          </b-tab>
        </b-tabs>
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
  BCol,
  BTab,
  BTabs
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
    BTab,
    BTabs,
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent,
    vSelect
  },
  data() {
    return {
      search_date: "",
      search_ref_no: "",
      search_description: "",
      mails: []
    };
  },
  mounted() {
    this.getMails();
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
    async getMails() {
      await this.axios
        .get("/api/auth/mail")
        .then((response) => {
          this.mails = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.mails = [];
        });
    },
    deleteMail(id) {
      if (confirm("Are you sure to delete this record?")) {
        this.axios
          .delete(`/api/auth/mail/${id}`)
          .then((response) => {
            this.getMails();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    searchDate() {
      axios
        .get("/api/auth/mail?search_date=" + this.search_date)
        .then((response) => (this.mails = response.data));
    },
    searchRefNo() {
      axios
        .get("/api/auth/mail?search_ref_no=" + this.search_ref_no)
        .then((response) => (this.mails = response.data));
    },
    searchDescription() {
      axios
        .get("/api/auth/mail?search_description=" + this.search_description)
        .then((response) => (this.mails = response.data));
    }
  }
};
</script>
<style lang="scss">
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>