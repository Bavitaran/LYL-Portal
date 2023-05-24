<template>
  <b-row>
    <b-col cols="12">
      <h2>New Matter</h2>
      <form-wizard-number />
    </b-col>
  </b-row>
</template>

<script>
import { BRow, BCol } from "bootstrap-vue";
import FormWizardNumber from "./FormWizardNumberWill.vue";

export default {
  components: {
    BRow,
    BCol,
    FormWizardNumber
  }
};
</script>

<style lang="scss">
@import "~@core/scss/vue/libs/vue-wizard.scss";
@import "~@core/scss/vue/libs/vue-select.scss";
</style>

