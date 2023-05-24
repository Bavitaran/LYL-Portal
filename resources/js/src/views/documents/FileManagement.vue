<template>
  <b-card>
    <b-row>
      <h2>Upload Documents</h2>
    </b-row>
    <br />
    <br />
    <b-form @submit="submitFileUpload">
      <b-row>
        <b-col sm="6">
          <b-form-group>
            <label>Document Name</label>
            <b-form-input v-model="file_name"></b-form-input>
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-group>
            <label>Choose File Ref:</label>
            <v-select
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              label="title"
              :options="file_ref"
              placeholder="File Ref"
              v-model="file_refs"
            />
          </b-form-group>
        </b-col>
      </b-row>
      <b-row>
        <b-col sm="6">
          <b-form-group>
            <label>Description</label>
            <b-form-textarea
              id="textarea"
              v-model="description"
              placeholder="Enter description..."
              rows="3"
              max-rows="6"
            ></b-form-textarea>
          </b-form-group>
        </b-col>
        <b-col sm="6">
          <b-form-file
            accept=".pdf"
            class="mt-3"
            plain
            for="inputFileUpload"
            v-on:change="onFileChange"
          ></b-form-file>
        </b-col>
      </b-row>
      <b-row>
        <b-col md="12" class="text-right">
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="primary"
            type="submit"
          >
            Submit
          </b-button>
        </b-col>
      </b-row>
    </b-form>
    <br />
    <br />
    <!-- table -->
    <vue-good-table
      :columns="columns"
      :rows="rows"
      :rtl="direction"
      :search-options="{
        enabled: true,
        externalQuery: searchTerm
      }"
      :pagination-options="{
        enabled: true,
        perPage: pageLength
      }"
      theme="my-theme"
      @on-row-click="onRowClick"
    >
      <template slot="table-row" slot-scope="props">
        <span v-if="props.column.field === 'fullName'" class="text-nowrap">
          <span>{{ props.row.fullName }}</span>
        </span>

        <!-- Column: Action -->
        <span v-else-if="props.column.field === 'action'">
          <span>
            <b-dropdown
              variant="link"
              toggle-class="text-decoration-none"
              no-caret
            >
              <template v-slot:button-content>
                <feather-icon
                  icon="MoreVerticalIcon"
                  size="16"
                  class="text-body align-middle mr-25"
                />
              </template>
              <b-dropdown-item>
                <feather-icon icon="EyeIcon" class="mr-50" />
                <span>View</span>
              </b-dropdown-item>
            </b-dropdown>
          </span>
        </span>
        <span v-else>
          {{ props.formattedRow[props.column.field] }}
        </span>
      </template>

      <!-- pagination -->
      <template slot="pagination-bottom" slot-scope="props">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="d-flex align-items-center mb-0 mt-1">
            <span class="text-nowrap"> Showing 1 to </span>
            <b-form-select
              v-model="pageLength"
              :options="['3', '5', '10']"
              class="mx-1"
              @input="
                (value) => props.perPageChanged({ currentPerPage: value })
              "
            />
            <span class="text-nowrap"> of {{ props.total }} entries </span>
          </div>
          <div>
            <b-pagination
              :value="1"
              :total-rows="props.total"
              :per-page="pageLength"
              first-number
              last-number
              align="right"
              prev-class="prev-item"
              next-class="next-item"
              class="mt-1 mb-0"
              @input="(value) => props.pageChanged({ currentPage: value })"
            >
              <template #prev-text>
                <feather-icon icon="ChevronLeftIcon" size="18" />
              </template>
              <template #next-text>
                <feather-icon icon="ChevronRightIcon" size="18" />
              </template>
            </b-pagination>
          </div>
        </div>
      </template>
    </vue-good-table>
  </b-card>
</template>

<script>
import {
  BRow,
  BButton,
  BCol,
  BCard,
  BFormGroup,
  BFormInput,
  BFormSelect,
  BFormTextarea,
  BFormFile,
  BPagination
} from "bootstrap-vue";
import vSelect from "vue-select";
import { VueGoodTable } from "vue-good-table";

export default {
  components: {
    BRow,
    BButton,
    BCol,
    BCard,
    BFormGroup,
    BFormInput,
    BFormSelect,
    BFormTextarea,
    BFormFile,
    BPagination,
    VueGoodTable,
    vSelect
  },
  mounted() {
    console.log("Component successfully upload");
  },

  data() {
    return {
      file_name: "",
      file_refs: "",
      description: "",
      file_ref: [
        { title: "2020.GP.5163.LKH(AN)" },
        { title: "2021.SH.5164.LKH(AN)" }
      ],
      pageLength: 5,
      columns: [
        {
          label: "No",
          field: "id"
        },
        {
          label: "Document Name",
          field: "document_name"
        },
        {
          label: "File Ref",
          field: "file_ref"
        },
        {
          label: "Date",
          field: "date"
        },
        {
          label: "Description",
          field: "description"
        },
        {
          label: "Action",
          field: "action"
        }
      ],
      rows: [],
      searchTerm: ""
    };
  },
  methods: {
    onFileChange(e) {
      console.log(e.target.files[0]);
      this.file = e.target.files[0];
    },
    submitFileUpload(e) {
      e.preventDefault();
      let currenrObj = this;

      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      let formData = new FormData();
      formData.append("file", this.file);

      axios
        .post("/api/auth/store_file", formData, config)
        .then(function (response) {
          currentObj.success = response.data.success;
        })
        .catch(function (error) {
          currentObj.output = error;
        });
    }
  }
};
</script>
<style lang="scss" >
@import "~@core/scss/vue/libs/vue-good-table.scss";
</style>