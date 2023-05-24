<template>
  <b-card>
    <b-form class="auth-register-form mt-2" @submit.prevent="addNewPost">
    <div class="custom-search">
      <!-- advance search input -->
      <b-row>
        <b-col md="12" class="text-right"> </b-col>
      </b-row>
      <br />
      <b-row>
        <b-col md="12">
          <b-form-group>
            <label>Link</label>
            <b-form-input
              id="floating-label1"
              placeholder="Link"
              v-model="link"
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
      link: '',

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
                axios.post('/api/auth/relevant',{link: this.link})
                .then((response)=>{
                    this.$router.push({name:"relevant"})
                $('#success').html(response.data.message)
                })
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>
