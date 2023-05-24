<template>
  <div>
    <!-- <user-list-add-new
      :is-add-new-user-sidebar-active.sync="isAddNewUserSidebarActive"
      :role-options="roleOptions"
      @refetch-data="refetchData"
    />

     Filters 
    <users-list-filters
      :role-filter.sync="roleFilter"
      :status-filter.sync="statusFilter"
      :role-options="roleOptions"
      :status-options="statusOptions"
    /> -->

    <!-- Table Container Card -->
    <b-card no-body class="mb-0">
      <div class="m-2">
        <b-row>
          <b-col md="12" class="text-right">
            <b-button
              v-ripple.400="'rgba(255, 255, 255, 0.15)'"
              variant="primary"
              :to="{ path: '/user/new-user' }"
            >
              <feather-icon icon="PlusIcon" class="mr-50" />
              Add User
            </b-button>
          </b-col>
        </b-row>
        <br />
        <b-row>
          <b-col md="5">
            <b-form-group>
              <label>Full Name</label>
              <b-form-input id="basicInput" placeholder="Enter Full Name" />
            </b-form-group>
          </b-col>
          <b-col md="5">
            <b-form-group>
              <label>Role</label>
              <v-select
                :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                label="title"
                :options="role"
                placeholder="Choose Role"
              />
            </b-form-group>
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
      </div>
      <div class="card-body">
        <!-- Table Top -->
        <b-row>
          <!-- Per Page -->
          <b-col
            cols="12"
            md="6"
            class="d-flex align-items-center justify-content-start mb-1 mb-md-0"
          >
            <label>Show</label>
            <v-select
              v-model="perPage"
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              :options="perPageOptions"
              :clearable="false"
              class="per-page-selector d-inline-block mx-50"
            />
            <label>entries</label>
          </b-col>
        </b-row>
        <br />
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Company Name</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody v-if="users.length > 0">
              <tr v-for="(user, key) in users" :key="key">
                <td>{{ user.id }}</td>
                <td>{{ user.fullname }}</td>
                <td>{{ user.company_name }}</td>
                <td class="text-center">
                  <router-link
                    :to="{ name: 'apps-users-edit', params: { id: user.id } }"
                    class="btn btn-success"
                    >Edit</router-link
                  >
                  <button
                    type="button"
                    @click="deleteUser(user.id)"
                    class="btn btn-danger"
                  >
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="4" align="center">No Users Found.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="mx-2 mb-2">
        <b-row>
          <b-col
            cols="12"
            sm="6"
            class="
              d-flex
              align-items-center
              justify-content-center justify-content-sm-start
            "
          >
            <span class="text-muted"
              >Showing {{ dataMeta.from }} to {{ dataMeta.to }} of
              {{ dataMeta.of }} entries</span
            >
          </b-col>
          <!-- Pagination -->
          <b-col
            cols="12"
            sm="6"
            class="
              d-flex
              align-items-center
              justify-content-center justify-content-sm-end
            "
          >
            <b-pagination
              v-model="currentPage"
              :total-rows="totalUsers"
              :per-page="perPage"
              first-number
              last-number
              class="mb-0 mt-1 mt-sm-0"
              prev-class="prev-item"
              next-class="next-item"
            >
              <template #prev-text>
                <feather-icon icon="ChevronLeftIcon" size="18" />
              </template>
              <template #next-text>
                <feather-icon icon="ChevronRightIcon" size="18" />
              </template>
            </b-pagination>
          </b-col>
        </b-row>
      </div>
    </b-card>
  </div>
</template>

<script>
import {
  BCard,
  BRow,
  BCol,
  BFormInput,
  BButton,
  BTable,
  BMedia,
  BAvatar,
  BLink,
  BBadge,
  BDropdown,
  BDropdownItem,
  BPagination
} from "bootstrap-vue";
import vSelect from "vue-select";
import store from "@/store";
import { ref, onUnmounted } from "@vue/composition-api";
import { avatarText } from "@core/utils/filter";
import UsersListFilters from "./UsersListFilters.vue";
import useUsersList from "./useUsersList";
import userStoreModule from "../userStoreModule";
import UserListAddNew from "./UserListAddNew.vue";

export default {
  name: "users",
  data() {
    return {
      users: []
    };
  },
  mounted() {
    this.getUsers();
  },
  components: {
    UsersListFilters,
    UserListAddNew,

    BCard,
    BRow,
    BCol,
    BFormInput,
    BButton,
    BTable,
    BMedia,
    BAvatar,
    BLink,
    BBadge,
    BDropdown,
    BDropdownItem,
    BPagination,

    vSelect
  },
  methods: {
    async getUsers() {
      await this.axios
        .get("/api/auth/users")
        .then((response) => {
          this.users = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.users = [];
        });
    },
    deleteUser(id) {
      if (confirm("Are you sure to delete this user ?")) {
        this.axios
          .delete(`/api/auth/users/${id}`)
          .then((response) => {
            this.getUsers();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    }
  },
  setup() {
    const USER_APP_STORE_MODULE_NAME = "app-user";

    // Register module
    if (!store.hasModule(USER_APP_STORE_MODULE_NAME))
      store.registerModule(USER_APP_STORE_MODULE_NAME, userStoreModule);

    // UnRegister on leave
    onUnmounted(() => {
      if (store.hasModule(USER_APP_STORE_MODULE_NAME))
        store.unregisterModule(USER_APP_STORE_MODULE_NAME);
    });

    const isAddNewUserSidebarActive = ref(false);

    const roleOptions = [
      { label: "Admin", value: "admin" },
      { label: "Lawyer", value: "author" },
      { label: "Vendor", value: "editor" },
      { label: "Purchaser", value: "maintainer" },
      { label: "Client", value: "subscriber" }
    ];

    // const planOptions = [
    //   // { label: "Basic", value: "basic" },
    //   // { label: "Company", value: "company" },
    //   // { label: "Enterprise", value: "enterprise" },
    //   // { label: "Team", value: "team" }
    // ];

    const statusOptions = [
      { label: "Pending", value: "pending" },
      { label: "Active", value: "active" },
      { label: "Inactive", value: "inactive" }
    ];

    const {
      fetchUsers,
      tableColumns,
      perPage,
      currentPage,
      totalUsers,
      dataMeta,
      perPageOptions,
      searchQuery,
      sortBy,
      isSortDirDesc,
      refUserListTable,
      refetchData,

      // UI
      resolveUserRoleVariant,
      resolveUserRoleIcon,
      resolveUserStatusVariant,

      // Extra Filters
      roleFilter,
      // planFilter,
      statusFilter
    } = useUsersList();

    return {
      // Sidebar
      isAddNewUserSidebarActive,

      fetchUsers,
      tableColumns,
      perPage,
      currentPage,
      totalUsers,
      dataMeta,
      perPageOptions,
      searchQuery,
      sortBy,
      isSortDirDesc,
      refUserListTable,
      refetchData,

      // Filter
      avatarText,

      // UI
      resolveUserRoleVariant,
      resolveUserRoleIcon,
      resolveUserStatusVariant,

      roleOptions,
      // planOptions,
      statusOptions,

      // Extra Filters
      roleFilter,
      // planFilter,
      statusFilter
    };
  }
};
</script>

<style lang="scss" scoped>
.per-page-selector {
  width: 90px;
}
</style>

<style lang="scss">
@import "~@core/scss/vue/libs/vue-select.scss";
</style>
