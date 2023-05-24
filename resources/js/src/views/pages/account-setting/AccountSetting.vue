<template>
  <b-tabs
    vertical
    content-class="col-12 col-md-9 mt-1 mt-md-0"
    pills
    nav-wrapper-class="col-md-3 col-12"
    nav-class="nav-left"
  >
    <!-- general tab -->
    <b-tab active>
      <!-- title -->
      <template #title>
        <feather-icon icon="UserIcon" size="18" class="mr-50" />
        <span class="font-weight-bold">General</span>
      </template>

      <account-setting-general
        v-if="options.general"
        :general-data="options.general"
      />
    </b-tab>
    <!--/ general tab -->
    <b-tab>
      <!-- title -->
      <template #title>
        <feather-icon icon="InfoIcon" size="18" class="mr-50" />
        <span class="font-weight-bold">Firm Information</span>
      </template>

      <account-firm-address />
    </b-tab>
    <b-tab>
      <!-- title -->
      <template #title>
        <feather-icon icon="CreditCardIcon" size="18" class="mr-50" />
        <span class="font-weight-bold">Firm Bank Account</span>
      </template>

      <account-firm-bank />
    </b-tab>
    <!-- change password tab -->
    <b-tab>
      <!-- title -->
      <template #title>
        <feather-icon icon="LockIcon" size="18" class="mr-50" />
        <span class="font-weight-bold">Change Password</span>
      </template>

      <account-setting-password />
    </b-tab>
  </b-tabs>
</template>

<script>
import { BTabs, BTab } from "bootstrap-vue";
import AccountSettingGeneral from "./AccountSettingGeneral.vue";
import AccountFirmAddress from "./AccountFirmAddress.vue";
import AccountFirmBank from "./AccountFirmBank.vue";
import AccountSettingPassword from "./AccountSettingPassword.vue";
import AccountSettingInformation from "./AccountSettingInformation.vue";
import AccountSettingSocial from "./AccountSettingSocial.vue";
import AccountSettingNotification from "./AccountSettingNotification.vue";

export default {
  components: {
    BTabs,
    BTab,
    AccountSettingGeneral,
    AccountFirmAddress,
    AccountFirmBank,
    AccountSettingPassword,
    AccountSettingInformation,
    AccountSettingSocial,
    AccountSettingNotification
  },
  data() {
    return {
      options: {}
    };
  },
  beforeCreate() {
    this.$http.get("/account-setting/data").then((res) => {
      this.options = res.data;
    });
  }
};
</script>
