<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header text-center"><h2>Upload Documents</h2></div>
          <div class="card-body">
            <div v-if="success != ''" class="alert alert-success">
              {{ success }}
            </div>
            <form
              class="row"
              @submit="formSubmit"
              method="POST"
              enctype="multipart/form-data"
            >
              <div class="form-group col-md-6">
                <label for="document_name">Document Name:</label>
                <input
                  id="document_name"
                  type="text"
                  class="form-control"
                  v-model="document_name"
                />
              </div>
              <div class="form-group col-md-4">
                <label for="docs">Choose file:</label>
                <input
                  id="docs"
                  type="file"
                  class="form-control"
                  v-on:change="onChange"
                />
              </div>
              <div class="form-group col-md-2">
                <label for="docs"></label>
                <button class="btn btn-primary btn-block">Upload</button>
              </div>
            </form>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Document Name</th>
                  <th>File Ref</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody v-if="file_uploads.length > 0">
                <tr
                  class="text-center"
                  v-for="(file_upload, key) in file_uploads"
                  :key="key"
                >
                  <td>{{ file_upload.id }}</td>
                  <td>{{ file_upload.document_name }}</td>
                  <td>File Ref</td>
                  <td>{{ file_upload.created_at }}</td>
                  <td>{{ file_upload.description }}</td>
                  <td>
                    <a><i class="fa-solid fa-pen-to-square"></i></a>
                    <a><i class="fa-solid fa-eye"></i></a>
                    <!-- <button type="button" @click="deleteMatter(matter.id)" class="btn btn-danger">Delete</button> -->
                    <a
                      style="color: #7367f0"
                      @click="deletefile_uploads(file_upload.id)"
                      ><i class="fa-solid fa-trash-can"></i
                    ></a>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="7" align="center">No Documents Found.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      name: "",
      file: "",
      description: "",
      document_name: "",
      success: "",
      file_uploads: []
    };
  },
  mounted() {
    this.getfile_uploads();
  },
  methods: {
    async getfile_uploads() {
      await this.axios
        .get("/api/auth/documents")
        .then((response) => {
          this.file_uploads = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.file_uploads = [];
        });
    },
    deletefile_uploads(id) {
      if (confirm("Are you sure to delete this Documnet ?")) {
        this.axios
          .delete(`/api/auth/documents/${id}`)
          .then((response) => {
            this.getfile_uploads();
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    onChange(e) {
      this.file = e.target.files[0];
    },
    formSubmit(e) {
      e.preventDefault();
      let existingObj = this;
      const config = {
        headers: {
          "content-type": "multipart/form-data"
        }
      };
      let data = new FormData();
      data.append("file", this.file);
      data.append("description", this.description);
      data.append("document_name", this.document_name);
      axios
        .post("/api/auth/documents", data, config)
        .then(function (res) {
          existingObj.success = res.data.success;
        })
        .catch(function (err) {
          existingObj.output = err;
        });
      this.$router.push({ name: "document-management" });
    }
  }
};
</script>
