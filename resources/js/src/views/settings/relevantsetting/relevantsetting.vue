<template>
  <b-card>
    <b-row>
      <b-col md="12" class="text-right">
        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          variant="primary"
          :to="{ path: '/add-relevant-settings' }"
        >
          <feather-icon icon="PlusIcon" class="mr-50" />
          Add Relevant
        </b-button>
      </b-col>
    </b-row>
    <hr />
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>Relevant Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody v-if="matters.length > 0">
          <tr class="text-center" v-for="(matter, key) in matters" :key="key">
            <td>{{ matter.id }}</td>
            <td>{{ matter.created_at }}</td>
            <td>
              <router-link
                :to="{ name: 'edit-relevantname', params: { id: matter.id } }"
                ><i class="fa-solid fa-pen-to-square"></i
              ></router-link>
              <a style="color: #7367f0" @click="deleterelevant(mail.id)"
                ><i class="fa-solid fa-trash-can"></i
              ></a>
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
  </b-card>
</template>

<script>
import {
  BBadge,
  BDropdown,
  BDropdownItem,
  BCard,
  BCardText,
  BPagination,
  BFormGroup,
  BFormInput,
  BFormSelect,
  BRow,
  BCol,
  BTabs,
  BTab,
  BButton
} from "bootstrap-vue";
// import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import { VueGoodTable } from "vue-good-table";
import vSelect from "vue-select";
import store from "@/store/index";

export default {
  components: {
    BBadge,
    BCard,
    BCardText,
    BDropdown,
    BDropdownItem,
    VueGoodTable,
    BPagination,
    BFormGroup,
    BFormInput,
    BFormSelect,
    BRow,
    BCol,
    BTabs,
    BCardText,
    BTab,
    BButton,
    // eslint-disable-next-line vue/no-unused-components
    // ToastificationContent,
    vSelect
  },
  data() {
    return {
      selectclient: { title: "Select Client" },
      optionclient: [
        { title: "Client 1" },
        { title: "Client 2" },
        { title: "Client 3" }
      ],
      selectfilestatus: { title: "Select File Status" },
      optionfilestatus: [{ title: "Pending Client" }, { title: "To Do" }],
      selectpic: { title: "Select Person In Charge" },
      optionpic: [{ title: "Person A" }, { title: "Person B" }],
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
    deleterelevant(id) {
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
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>