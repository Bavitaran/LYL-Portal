<template>
  <b-card>
    <b-row>
      <b-col md="12" class="text-right">
        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          variant="primary"
          :to="{ path: '/add-mail-desc' }"
        >
          <feather-icon icon="PlusIcon" class="mr-50" />
          New Mail Description
        </b-button>
      </b-col>
    </b-row>

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table">
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody v-if="mails.length > 0">
                <tr class="text-center" v-for="(mail, key) in mails" :key="key">
                  <td>{{ mail.id }}</td>
                  <td>{{ mail.description }}</td>
                  <td>
                    <router-link
                      :to="{ name: 'edit-mail-desc', params: { id: mail.id } }"
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
