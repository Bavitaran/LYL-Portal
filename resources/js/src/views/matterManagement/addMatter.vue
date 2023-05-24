<template>
  <b-card>
    <div class="custom-search">
      <!-- advance search input -->
      <b-row>
        <b-col md="12" class="text-right"> </b-col>
      </b-row>
      <br />
      <b-row>
        <b-col md="6">
          <b-form-group>
            <label>Matter type</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="matter_type"
              placeholder="Choose Matter Type"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Client Company</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              multiple
              :options="client"
              placeholder="Choose Client Company"
            />
          </b-form-group>
        </b-col>
        <b-col md="12">
          <b-form-group>
            <label>Description</label>
            <b-form-textarea
              id="textarea-default"
              placeholder="Type your description"
              rows="2"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>File Group</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="matter_type"
              placeholder="Choose File Group"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Control Account</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="control_account"
              placeholder="Choose Control Account"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Person In Charge(PIC)</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="pic"
              placeholder="Choose Person In Charge"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Lawyer</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="lawyer"
              placeholder="Choose Lawyer"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Tasks' Assign</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="tasks_assign"
              placeholder="Choose Tasks' Assign"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Tasks' Recipient</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="tasks_recipient"
              placeholder="Choose Tasks' Recipient"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>File Ref</label>
            <b-form-input
              id="floating-label1"
              placeholder="File Ref"
              v-model="file_ref"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Remark</label>
            <b-form-textarea
              id="textarea-default"
              placeholder="Type your remark"
              rows="2"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <b-button v-ripple.400> </b-button>
      </b-row>
      <b-row>
        <b-col md="6">
          <b-form-group>
            <label>Purchaser 1: </label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="purchaser_one"
              placeholder="Choose Purchaser 1"
            />
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-group>
            <label>Purchaser 2: </label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="purchaser_one"
              placeholder="Choose Purchaser 1"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <br />
      <br />
      <br />
    </div>
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
  BFormTextarea,
  BRow,
  BCol
} from "bootstrap-vue";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";
import { VueGoodTable } from "vue-good-table";
import vSelect from "vue-select";
import store from "@/store/index";

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
    BFormTextarea,
    BRow,
    BCol,
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent,
    vSelect
  },
  data() {
    return {
      client: [{ title: "Louis Ling" }, { title: "Yi Leong" }],
      file_ref: "2020.GP.5163.LKH(AN)",
      cfile_status: [
        { title: "Pending" },
        { title: "To Do" },
        { title: "Urgent" },
        { title: "Ready" }
      ],
      pageLength: 5,
      dir: false,
      columns: [
        {
          label: "No",
          field: "id"
        },
        {
          label: "File Ref",
          field: "file_ref"
        },
        {
          label: "Client",
          field: "fullName"
        },
        {
          label: "Description",
          field: "post"
        },
        {
          label: "File Status",
          field: "file_status"
        },
        {
          label: "Action",
          field: "action"
        }
      ],
      rows: [],
      searchTerm: "",
      status: [
        {
          1: "Current",
          2: "Professional",
          3: "Rejected",
          4: "Resigned",
          5: "Applied"
        },
        {
          1: "light-primary",
          2: "light-success",
          3: "light-danger",
          4: "light-warning",
          5: "light-info"
        }
      ]
    };
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
    advanceSearch(val) {
      this.searchTerm = val;
    },
    onRowClick(params) {
      this.$toast({
        component: ToastificationContent,
        props: {
          title: `Hello user! You have clicked on row ${params.row.id}`,
          icon: "UserIcon",
          variant: "success"
        }
      });
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>