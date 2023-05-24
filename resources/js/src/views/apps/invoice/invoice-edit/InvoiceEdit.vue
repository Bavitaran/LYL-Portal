<template>
  <b-card>
    <b-form @submit.prevent>
      <b-row>
        <b-col cols="12" class="mb-2">
          <h5 class="mb-0">Invoice Quotation</h5>
        </b-col>
      </b-row>

      <b-col md="6">
        <b-form-group
          label="Official Receipt File Reference No."
          label-for="filerefno"
          ><b-form-input
            id="offrecno"
            placeholder="Official Receipt  File References No."
            readonly
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Official Receipt No." label-for="offrecno">
          <b-form-input
            id="offrecno"
            placeholder="Official Receipt No."
            readonly
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Official Receipt Description" label-for="desc">
          <b-form-textarea
            id="desc"
            v-model="invoice.description"
            placeholder="Official Receipt Description"
            rows="3"
          />
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label="Official Receipt Amount Received"
          label-for="amountreceived"
        >
          <b-input-group prepend="RM">
            <b-form-input v-model="invoice.price" />
          </b-input-group>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group label="Official Receipt Payee Name" label-for="payeename">
          <div class="form-label-group">
            <b-form-input
              placeholder="Official Receipt Payee Name"
              v-model="invoice.invoice_to"
            />
          </div>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label-for="payeeref"
          label="Official Receipt Payee Reference"
        >
          <div class="form-label-group">
            <b-form-input
              id="payeeref"
              placeholder="Official Receipt Payee Reference"
            />
          </div>
        </b-form-group>
      </b-col>
      <b-col md="6">
        <b-form-group
          label="Official Receipt Supporting Documents"
          label-for="payeeref"
        >
          <b-form-file
            v-model="file"
            placeholder="Choose a file or drop it here..."
            drop-placeholder="Drop file here..."
          />

          <b-card-text class="my-1">
            Selected file: <strong>{{ file ? file.name : "" }}</strong>
          </b-card-text>
        </b-form-group>
      </b-col>
      <br />
      <!-- submit and reset -->
      <b-col>
        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          type="submit"
          variant="primary"
          class="mr-1"
        >
          Submit
        </b-button>
        <b-button
          v-ripple.400="'rgba(186, 191, 199, 0.15)'"
          type="reset"
          variant="outline-secondary"
        >
          Reset
        </b-button>
      </b-col>
    </b-form>
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
  BFormFile
} from "bootstrap-vue";
import vSelect from "vue-select";
import flatPickr from "vue-flatpickr-component";
import invoiceStoreModule from "../invoiceStoreModule";
import InvoiceSidebarSendInvoice from "../InvoiceSidebarSendInvoice.vue";
import InvoiceSidebarAddPayment from "../InvoiceSidebarAddPayment.vue";

export default {
  name: "update-invoice",
  data() {
    return {
      invoice: {
        date: "",
        due_date: "",
        invoice_to: "",
        item: "",
        cost: "",
        price: "",
        description: "",
        sales_person: "",
        note: "",
        payment_method: "",
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
    flatPickr,
    vSelect,
    Logo,
    InvoiceSidebarSendInvoice,
    InvoiceSidebarAddPayment,
    BFormFile
  },
  directives: {
    Ripple,
    "b-toggle": VBToggle
  },
  mixins: [heightTransition],

  // Reset Tr Height if data changes
  watch: {
    // eslint-disable-next-line func-names
    "invoiceData.items": function () {
      this.initTrHeight();
    }
  },
  mounted() {
    this.initTrHeight(), this.showInvoice();
  },
  created() {
    window.addEventListener("resize", this.initTrHeight);
  },
  destroyed() {
    window.removeEventListener("resize", this.initTrHeight);
  },
  methods: {
    async showInvoice() {
      await this.axios
        .get(`/api/auth/invoice/${this.$route.params.id}`)
        .then((response) => {
          const {
            date,
            due_date,
            invoice_to,
            item,
            cost,
            quantity,
            price,
            description,
            sales_person,
            note,
            payment_method
          } = response.data;
          this.invoice.date = date;
          this.invoice.due_date = due_date;
          this.invoice.invoice_to = invoice_to;
          this.invoice.item = item;
          this.invoice.cost = cost;
          this.invoice.quantity = quantity;
          this.invoice.price = price;
          this.invoice.description = description;
          this.invoice.sales_person = sales_person;
          this.invoice.note = note;
          this.invoice.payment_method = payment_method;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async update() {
      await this.axios
        .post(`/api/auth/invoice/${this.$route.params.id}`, this.invoice)
        .then((response) => {
          this.$router.push({ name: "apps-invoice-list" });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    addNewItemInItemForm() {
      this.$refs.form.style.overflow = "hidden";
      this.invoiceData.items.push(
        JSON.parse(JSON.stringify(this.itemFormBlankItem))
      );

      this.$nextTick(() => {
        this.trAddHeight(this.$refs.row[0].offsetHeight);
        setTimeout(() => {
          this.$refs.form.style.overflow = null;
        }, 350);
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
  },
  setup() {
    const INVOICE_APP_STORE_MODULE_NAME = "app-invoice";

    // Register module
    if (!store.hasModule(INVOICE_APP_STORE_MODULE_NAME))
      store.registerModule(INVOICE_APP_STORE_MODULE_NAME, invoiceStoreModule);

    // UnRegister on leave
    onUnmounted(() => {
      if (store.hasModule(INVOICE_APP_STORE_MODULE_NAME))
        store.unregisterModule(INVOICE_APP_STORE_MODULE_NAME);
    });

    const invoiceData = ref(null);
    const paymentDetails = ref({});

    store
      .dispatch("app-invoice/fetchInvoice", {
        id: router.currentRoute.params.id
      })
      .then((response) => {
        invoiceData.value = response.data.invoice;
        paymentDetails.value = response.data.paymentDetails;

        // ? We are adding some extra data in response for data purpose
        // * Your response will contain this extra data
        // ? [Purpose is to make it more API friendly and less static as possible]
        invoiceData.value.items = [
          {
            itemTitle: "App Design",
            cost: 24,
            qty: 2,
            description: "Designed UI kit & app pages."
          }
        ];
        invoiceData.value.note =
          "It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!";
        invoiceData.value.paymentMethod = "Bank Account";
      })
      .catch((error) => {
        if (error.response.status === 404) {
          invoiceData.value = undefined;
        }
      });

    const itemFormBlankItem = {
      item: null,
      cost: 0,
      qty: 0,
      description: ""
    };

    const itemsOptions = [
      {
        itemTitle: "App Design",
        cost: 24,
        qty: 1,
        description: "Designed UI kit & app pages."
      },
      {
        itemTitle: "App Customization",
        cost: 26,
        qty: 1,
        description: "Customization & Bug Fixes."
      },
      {
        itemTitle: "ABC Template",
        cost: 28,
        qty: 1,
        description: "Bootstrap 4 admin template."
      },
      {
        itemTitle: "App Development",
        cost: 32,
        qty: 1,
        description: "Native App Development."
      }
    ];

    const updateItemForm = (index, val) => {
      const { cost, qty, description } = val;
      invoiceData.value.items[index].cost = cost;
      invoiceData.value.items[index].qty = qty;
      invoiceData.value.items[index].description = description;
    };

    const paymentMethods = ["Bank Account", "PayPal", "UPI Transfer"];

    return {
      invoiceData,
      itemsOptions,
      updateItemForm,
      itemFormBlankItem,
      paymentMethods
    };
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
