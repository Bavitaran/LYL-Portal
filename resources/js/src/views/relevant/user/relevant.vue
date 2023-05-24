<template>
  <b-card>
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table">
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody v-if="relevants.length > 0">
                <tr
                  class="text-center"
                  v-for="(relevant, key) in relevants"
                  :key="key"
                >
                  <td>{{ relevant.id }}</td>
                  <td>
                    {{ relevant.link }}
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Relevant Found.</td>
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
      relevants: []
    };
  },
  mounted() {
    this.getRelevants();
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
    async getRelevants() {
      await this.axios
        .get("/api/auth/relevant")
        .then((response) => {
          this.relevants = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.relevants = [];
        });
    },
    deleteRelevant(id) {
      if (confirm("Are you sure to delete this Link ?")) {
        this.axios
          .delete(`/api/auth/relevant/${id}`)
          .then((response) => {
            this.getRelevants();
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
