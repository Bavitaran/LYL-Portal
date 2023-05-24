<template>
  <div>
      <form @submit.prevent="update">
    <!-- Media -->
    <b-media class="mb-2">
      <template #aside>
        <b-avatar
          ref="previewEl"
          :src="userData.avatar"
          :text="avatarText(userData.fullName)"
          :variant="`light-${resolveUserRoleVariant(userData.role)}`"
          size="90px"
          rounded
        />
      </template>
      <h4 class="mb-1">
        {{ userData.fullName }}
      </h4>
      <div class="d-flex flex-wrap">
        <b-button variant="primary" @click="$refs.refInputEl.click()">
          <input
            ref="refInputEl"
            type="file"
            class="d-none"
            @input="inputImageRenderer"
          />
          <span class="d-none d-sm-inline">Update</span>
          <feather-icon icon="EditIcon" class="d-inline d-sm-none" />
        </b-button>
        <b-button variant="outline-secondary" class="ml-1">
          <span class="d-none d-sm-inline">Remove</span>
          <feather-icon icon="TrashIcon" class="d-inline d-sm-none" />
        </b-button>
      </div>
    </b-media>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                        <div class="row">
                            <div class="col-4 mb-2">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" v-model="user.fullname">
                                </div>
                            </div>
                            <div class="col-4 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" v-model="user.email">
                                </div>
                            </div>
                            <div class="col-4 mb-2">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" v-model="user.mobile_number">
                                </div>
                            </div>
                            <div class="col-4 mb-2">
                                <div class="form-group">
                                    <label>IC Number</label>
                                    <input type="text" class="form-control" v-model="user.ic_number">
                                </div>
                            </div>
                            <div class="col-4 mb-2">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" v-model="user.company_name">
                                </div>
                            </div>
                            <div class="col-4 mb-2">
                                <div class="form-group">
                                    <label>Role ID</label>
                                    <input type="text" class="form-control" v-model="user.roles_id">
                                </div>
                            </div>


                        </div>

                </div>
            </div>
        </div>
    </div>


    <!-- PERMISSION TABLE -->
    <b-card no-body class="border mt-1">
      <b-card-header class="p-1">
        <b-card-title class="font-medium-2">
          <feather-icon icon="LockIcon" size="18" />
          <span class="align-middle ml-50">Permission</span>
        </b-card-title>
      </b-card-header>
      <b-table striped responsive class="mb-0" :items="permissionsData">
        <template #cell(module)="data">
          {{ data.value }}
        </template>
        <template #cell()="data">
          <b-form-checkbox :checked="data.value" />
        </template>
      </b-table>
    </b-card>

    <!-- Action Buttons -->
    <b-button
     type="submit"
      variant="primary"
      class="mb-1 mb-sm-0 mr-0 mr-sm-1"
      :block="$store.getters['app/currentBreakPoint'] === 'xs'"
    >
      Save Changes
    </b-button>
    <b-button
      variant="outline-secondary"
      type="reset"
      :block="$store.getters['app/currentBreakPoint'] === 'xs'"
    >
      Reset
    </b-button>
</form>
  </div>

</template>

<script>
import {
  BButton,
  BMedia,
  BAvatar,
  BRow,
  BCol,
  BFormGroup,
  BFormInput,
  BForm,
  BTable,
  BCard,
  BCardHeader,
  BCardTitle,
  BFormCheckbox
} from "bootstrap-vue";
import { avatarText } from "@core/utils/filter";
import vSelect from "vue-select";
import { useInputImageRenderer } from "@core/comp-functions/forms/form-utils";
import { ref } from "@vue/composition-api";
import useUsersList from "../users-list/useUsersList";

export default {
  name: "update-user",
  data() {
    return {
      user: {
        roles_id: "",
        fullname: "",
        email: "",
        mobile_number: "",
        company_name: "",
        ic_number: "",
        _method: "patch"
      }
    };
  },
  components: {
    BButton,
    BMedia,
    BAvatar,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BForm,
    BTable,
    BCard,
    BCardHeader,
    BCardTitle,
    BFormCheckbox,
    vSelect
  },
  props: {
    userData: {
      type: Object,
      required: true
    }
  },
  mounted() {
    this.showUser();
  },
  methods: {
    async showUser() {
      await this.axios
        .get(`/api/auth/users/${this.$route.params.id}`)
        .then((response) => {
          const {
            fullname,
            roles_id,
            email,
            mobile_number,
            company_name,
            ic_number
          } = response.data;
          this.user.fullname = fullname;
          this.user.roles_id = roles_id;
          this.user.email = email;
          this.user.mobile_number = mobile_number;
          this.user.company_name = company_name;
          this.user.ic_number = ic_number;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async update() {
      await this.axios
        .post(`/api/auth/users/${this.$route.params.id}`, this.user)
        .then((response) => {
          this.$router.push({ name: "apps-users-list" });
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
  setup(props) {
    const { resolveUserRoleVariant } = useUsersList();

    const roleOptions = [
      { label: "Admin", value: "admin" },
      { label: "Author", value: "author" },
      { label: "Editor", value: "editor" },
      { label: "Maintainer", value: "maintainer" },
      { label: "Subscriber", value: "subscriber" }
    ];

    const statusOptions = [
      { label: "Pending", value: "pending" },
      { label: "Active", value: "active" },
      { label: "Inactive", value: "inactive" }
    ];

    const permissionsData = [
      {
        module: "Admin",
        read: true,
        write: false,
        create: false,
        delete: false
      },
      {
        module: "Staff",
        read: false,
        write: true,
        create: false,
        delete: false
      },
      {
        module: "Author",
        read: true,
        write: false,
        create: true,
        delete: false
      },
      {
        module: "Contributor",
        read: false,
        write: false,
        create: false,
        delete: false
      },
      {
        module: "User",
        read: false,
        write: false,
        create: false,
        delete: true
      }
    ];

    // ? Demo Purpose => Update image on click of update
    const refInputEl = ref(null);
    const previewEl = ref(null);

    const { inputImageRenderer } = useInputImageRenderer(
      refInputEl,
      (base64) => {
        // eslint-disable-next-line no-param-reassign
        props.userData.avatar = base64;
      }
    );

    return {
      resolveUserRoleVariant,
      avatarText,
      roleOptions,
      statusOptions,
      permissionsData,

      //  ? Demo - Update Image on click of update button
      refInputEl,
      previewEl,
      inputImageRenderer
    };
  }
};
</script>

<style lang="scss">
@import "~@core/scss/vue/libs/vue-select.scss";
</style>
