<template>
  <b-card>
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
          <tr class="text-center" v-for="(matter, key) in matters" :key="key">
            <td>{{ matter.id }}</td>
            <td>{{ matter.created_at }}</td>
            <td>{{ matter.file_ref }}</td>
            <td>{{ matter.client_company }}</td>
            <td>{{ matter.pic }}</td>
            <td>{{ matter.status }}</td>
            <td>
              <router-link
                :to="{ name: 'edit-matter', params: { id: matter.id } }"
                ><i class="fa-solid fa-pen-to-square"></i
              ></router-link>
              <router-link
                :to="{ name: 'view-matter', params: { id: matter.id } }"
                ><i class="fa-solid fa-eye"></i
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
    advanceSearch(val) {
      this.searchTerm = val;
    },
    // onRowClick(params) {
    //   this.$toast({
    //     component: ToastificationContent,
    //     props: {
    //       title: `Hello user! You have clicked on row ${params.row.id}`,
    //       icon: "UserIcon",
    //       variant: "success"
    //     }
    //   });
    // }
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
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>