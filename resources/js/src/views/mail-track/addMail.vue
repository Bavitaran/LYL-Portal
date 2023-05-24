<template>
  <b-card>
    <b-form class="auth-register-form mt-2" @submit.prevent="addNewPost">
    <div class="custom-search">
      <b-row>
        <b-col md="12" class="text-right"> </b-col>
      </b-row>
      <br />
      <b-row>
        <b-col md="6">
          <b-form-group>
            <label>Date:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Date"
              v-model="date"
              type="date"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Despatch:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Despatch"
              v-model="despatch"
            />
          </b-form-group>
        </b-col>

        <b-col md="12">
          <b-form-group>
            <label>Ref. No.:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Ref. No."
              v-model="ref_no"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Recipient Add.:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Recipient Add."
              v-model="recipient_add"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Description / Type of Documnet:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Description / Type of Documnet"
              v-model="description"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Total Amount:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Total Amount"
              v-model="total_amount"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Incoming Salinan Pendua / Presentation Doc Received Date:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Presentation Doc Received Date"
              v-model="incoming"
              type="date"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Paid Amount:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Paid Amount"
              v-model="paid_amount"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Collection Due Date:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Collection Due Date"
              v-model="due_date"
              type="date"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>Outgoing Date / Collected By:</label>
            <b-form-input
              id="floating-label1"
              placeholder="Outgoing Date"
              v-model="outgoing_date"
              type="date"
            />
          </b-form-group>
        </b-col>

        <b-col md="6">
          <b-form-group>
            <label>PIC:</label>
            <b-form-input
              id="floating-label1"
              placeholder="PIC"
              v-model="pic"
            />
          </b-form-group>
        </b-col>




      </b-row>


      <br />
      <br />
      <br />
      <b-button v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                variant="outline-primary"  block type="submit">
                Save
              </b-button>
    </div>
    </b-form>
  </b-card>
</template>

<script>
import axios from 'axios'
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
  BCol,
  BCardBody,
  BForm,
  BInputGroup,
  BInputGroupPrepend,
  BFormCheckbox,
  BPopover,
  VBToggle
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

    BCardBody,
    BForm,
    BInputGroup,
    BInputGroupPrepend,
    BFormCheckbox,
    BPopover,
    // eslint-disable-next-line vue/no-unused-components
    ToastificationContent,
    vSelect
  },
  data() {
    return {
            date: '',
            despatch: '',
            ref_no: '',
            recipient_add: '',
            description: '',
            total_amount: '',
            incoming: '',
            paid_amount: '',
            due_date: '',
            outgoing_date: '',
            pic: '',
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
    },
    addNewPost(){
                axios.post('/api/auth/mail',{date: this.date, despatch:this.despatch, ref_no:this.ref_no, recipient_add:this.recipient_add, description:this.description, total_amount:this.total_amount, incoming:this.incoming, paid_amount:this.paid_amount, due_date:this.due_date, outgoing_date:this.outgoing_date, pic:this.pic})
                .then((response)=>{
                    this.$router.push({name:"mail-track"})
                $('#success').html(response.data.message)
                })
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
