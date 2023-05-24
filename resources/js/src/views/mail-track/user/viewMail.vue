<!--<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Update Mail Track</h4>
        </div>
        <div class="card-body">
          <form @submit.prevent="update">
            <div class="row">
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>Date:</label>
                  <input
                    type="date"
                    class="form-control"
                    v-model="mail.date"
                    readonly
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>Dispatch:</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="mail.despatch"
                    readonly
                  />
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label>File Reference. No.:</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="mail.ref_no"
                    readonly
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>Recipient Address:</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="mail.recipient_add"
                    readonly
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>Description</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="mail.description"
                    readonly
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label
                    >Incoming Salinan Pendua / Presentation Doc Received
                    Date:</label
                  >
                  <input
                    type="date"
                    class="form-control"
                    v-model="mail.incoming"
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>Paid Amount:</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="mail.paid_amount"
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>Collection Due Date:</label>
                  <input
                    type="date"
                    class="form-control"
                    v-model="mail.due_date"
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>Outgoing Date / Collected By:</label>
                  <input
                    type="date"
                    class="form-control"
                    v-model="mail.outgoing_date"
                  />
                </div>
              </div>
              <div class="col-6 mb-2">
                <div class="form-group">
                  <label>PIC:</label>
                  <input type="text" class="form-control" v-model="mail.pic" />
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Logo from "@core/layouts/components/Logo.vue";
import { ref, onUnmounted } from "@vue/composition-api";
import { heightTransition } from "@core/mixins/ui/transition";
import Ripple from "vue-ripple-directive";
import store from "@/store";
import router from "@/router";
import {
  BRow,
  BCol,
  BCard,
  BCardBody,
  BButton,
  BCardText,
  BForm,
  BFormGroup,
  BFormInput,
  BInputGroup,
  BInputGroupPrepend,
  BFormTextarea,
  BFormCheckbox,
  BPopover,
  BAlert,
  BLink,
  VBToggle
} from "bootstrap-vue";

export default {
  name: "update-mail",
  data() {
    return {
      mail: {
        date: "",
        despatch: "",
        ref_no: "",
        recipient_add: "",
        description: "",
        total_amount: "",
        incoming: "",
        paid_amount: "",
        due_date: "",
        outgoing_date: "",
        pic: "",
        _method: "patch"
      }
    };
  },
  components: {
    BRow,
    BCol,
    BCard,
    BCardBody,
    BButton,
    BCardText,
    BForm,
    BFormGroup,
    BFormInput,
    BInputGroup,
    BInputGroupPrepend,
    BFormTextarea,
    BFormCheckbox,
    BPopover,
    BAlert,
    BLink,

    Logo
  },
  directives: {
    Ripple,
    "b-toggle": VBToggle
  },
  mixins: [heightTransition],

  // Reset Tr Height if data changes

  mounted() {
    this.initTrHeight(), this.showMail();
  },
  created() {
    window.addEventListener("resize", this.initTrHeight);
  },
  destroyed() {
    window.removeEventListener("resize", this.initTrHeight);
  },
  methods: {
    async showMail() {
      await this.axios
        .get(`/api/auth/mail/${this.$route.params.id}`)
        .then((response) => {
          const {
            date,
            despatch,
            ref_no,
            recipient_add,
            description,
            total_amount,
            incoming,
            paid_amount,
            due_date,
            outgoing_date,
            pic
          } = response.data;
          this.mail.date = date;
          this.mail.despatch = despatch;
          this.mail.ref_no = ref_no;
          this.mail.recipient_add = recipient_add;
          this.mail.description = description;
          this.mail.total_amount = total_amount;
          this.mail.incoming = incoming;
          this.mail.paid_amount = paid_amount;
          this.mail.due_date = due_date;
          this.mail.outgoing_date = outgoing_date;
          this.mail.pic = pic;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async update() {
      await this.axios
        .post(`/api/auth/mail/${this.$route.params.id}`, this.mail)
        .then((response) => {
          this.$router.push({ name: "mail-track" });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    removeItem(index) {
      this.invoiceData.items.splice(index, 1);
      this.trTrimHeight(this.$refs.row[0].offsetHeight);
    },
    initTrHeight() {
      this.trSetHeight(null);
      this.$nextTick(() => {
        this.trSetHeight(this.$refs.form ? this.$refs.form.scrollHeight : 0);
      });
    }
  }
};
</script>

<style lang="scss">
@import "~@core/scss/vue/libs/vue-select.scss";
@import "~@core/scss/vue/libs/vue-flatpicker.scss";
</style>

<style lang="scss" scoped>
@import "~@core/scss/base/pages/app-invoice.scss";

.form-item-section {
  background-color: $product-details-bg;
}

.form-item-action-col {
  width: 27px;
}

.repeater-form {
  // overflow: hidden;
  transition: 0.35s height;
}

.v-select {
  &.item-selector-title,
  &.payment-selector {
    background-color: #fff;

    .dark-layout & {
      background-color: unset;
    }
  }
}

.dark-layout {
  .form-item-section {
    background-color: $theme-dark-body-bg;

    .row .border {
      background-color: $theme-dark-card-bg;
    }
  }
}
</style>
-->

<template>
  <b-card title="Update Mail Track">
    <validation-observer ref="simpleRules">
      <form @submit.prevent="update">
        <b-row>
          <!--Enter Date -->
          <b-col md="6">
            <b-form-group>
              <label>Date</label>
              <input
                type="date"
                class="form-control"
                v-model="mail.date"
                readonly
              />
            </b-form-group>
          </b-col>
          <!--  This field is required-->
          <b-col md="6">
            <b-form-group>
              <label>Dispatch</label>
              <input
                type="text"
                class="form-control"
                v-model="mail.despatch"
                readonly
              />
            </b-form-group>
          </b-col>

          <!-- File Ref -->
          <b-col md="6">
            <b-form-group>
              <label>File Reference No.</label>
              <input
                type="text"
                class="form-control"
                v-model="mail.ref_no"
                readonly
              />
            </b-form-group>
          </b-col>

          <!--  Only alphabetic characters-->
          <b-col md="6">
            <b-form-group>
              <label>Recipient's Address</label>
              <b-form-textarea v-model="mail.recipient_add" readonly />
            </b-form-group>
          </b-col>

          <!-- Description -->
          <b-col md="6">
            <b-form-group>
              <label>Description</label>
              <input
                type="text"
                class="form-control"
                v-model="mail.description"
                readonly
              />
            </b-form-group>
          </b-col>

          <!--Password Input Field -->
          <b-col md="6">
            <b-form-group>
              <label>Document Collection Date</label>
              <input type="date" class="form-control" v-model="mail.due_date" />
            </b-form-group>
          </b-col>

          <!-- The digits field must be numeric and exactly contain 3 digits -->
          <b-col md="6">
            <b-form-group>
              <label>Duplicate Document Collection Date</label>
              <input type="date" class="form-control" v-model="mail.incoming" />
            </b-form-group>
          </b-col>

          <!--Only alphabetic characters, numbers, dashes or underscores -->
          <b-col md="6">
            <b-form-group>
              <label>Dispatch Charges</label>
              <!-- append and pepend -->
              <b-input-group prepend="RM">
                <input
                  type="text"
                  class="form-control"
                  v-model="mail.paid_amount"
                />
              </b-input-group>
            </b-form-group>
          </b-col>

          <!-- submit button -->
          <b-col cols="12">
            <b-button variant="primary" type="submit"> Submit </b-button>
          </b-col>
        </b-row>
      </form>
    </validation-observer>
  </b-card>
</template>

<script>
import Logo from "@core/layouts/components/Logo.vue";
import { ref, onUnmounted } from "@vue/composition-api";
import { heightTransition } from "@core/mixins/ui/transition";
import Ripple from "vue-ripple-directive";
import store from "@/store";
import router from "@/router";
import {
  BRow,
  BCol,
  BCard,
  BCardBody,
  BButton,
  BCardText,
  BForm,
  BFormGroup,
  BFormInput,
  BInputGroup,
  BInputGroupPrepend,
  BFormTextarea,
  BFormCheckbox,
  BPopover,
  BAlert,
  BLink,
  VBToggle,
  BInputGroupAppend
} from "bootstrap-vue";

export default {
  name: "update-mail",
  data() {
    return {
      mail: {
        date: "",
        despatch: "",
        ref_no: "",
        recipient_add: "",
        description: "",
        incoming: "",
        paid_amount: "",
        due_date: "",
        _method: "patch"
      }
    };
  },
  components: {
    BRow,
    BCol,
    BCard,
    BCardBody,
    BButton,
    BCardText,
    BForm,
    BFormGroup,
    BFormInput,
    BInputGroup,
    BInputGroupPrepend,
    BFormTextarea,
    BFormCheckbox,
    BPopover,
    BAlert,
    BLink,
    BInputGroupAppend,

    Logo
  },
  directives: {
    Ripple,
    "b-toggle": VBToggle
  },
  mixins: [heightTransition],

  // Reset Tr Height if data changes

  mounted() {
    this.initTrHeight(), this.showMail();
  },
  created() {
    window.addEventListener("resize", this.initTrHeight);
  },
  destroyed() {
    window.removeEventListener("resize", this.initTrHeight);
  },
  methods: {
    async showMail() {
      await this.axios
        .get(`/api/auth/mail/${this.$route.params.id}`)
        .then((response) => {
          const {
            date,
            despatch,
            ref_no,
            recipient_add,
            description,
            incoming,
            paid_amount,
            due_date
          } = response.data;
          this.mail.date = date;
          this.mail.despatch = despatch;
          this.mail.ref_no = ref_no;
          this.mail.recipient_add = recipient_add;
          this.mail.description = description;
          this.mail.incoming = incoming;
          this.mail.paid_amount = paid_amount;
          this.mail.due_date = due_date;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async update() {
      await this.axios
        .post(`/api/auth/mail/${this.$route.params.id}`, this.mail)
        .then((response) => {
          this.$router.push({ name: "mail-track" });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    removeItem(index) {
      this.invoiceData.items.splice(index, 1);
      this.trTrimHeight(this.$refs.row[0].offsetHeight);
    },
    initTrHeight() {
      this.trSetHeight(null);
      this.$nextTick(() => {
        this.trSetHeight(this.$refs.form ? this.$refs.form.scrollHeight : 0);
      });
    }
  }
};
</script>

<style lang="scss">
@import "~@core/scss/vue/libs/vue-select.scss";
@import "~@core/scss/vue/libs/vue-flatpicker.scss";
</style>

<style lang="scss" scoped>
@import "~@core/scss/base/pages/app-invoice.scss";

.form-item-section {
  background-color: $product-details-bg;
}

.form-item-action-col {
  width: 27px;
}

.repeater-form {
  // overflow: hidden;
  transition: 0.35s height;
}

.v-select {
  &.item-selector-title,
  &.payment-selector {
    background-color: #fff;

    .dark-layout & {
      background-color: unset;
    }
  }
}

.dark-layout {
  .form-item-section {
    background-color: $theme-dark-body-bg;

    .row .border {
      background-color: $theme-dark-card-bg;
    }
  }
}
</style>