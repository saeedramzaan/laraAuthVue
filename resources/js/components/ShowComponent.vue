<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">User List</div>

          <div class="card-body">
            <table>
              <tr>
                <th width="50%">Title</th>
                <th width="50%">Description</th>
              </tr>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.title }}</td>
                <td>{{ user.desc }}</td>
                <td><a v-bind:href="'edit/' + user.id"> Edit </a></td>
                <td>
                  <button
                    class="btn btn-danger"
                    @click="deleteProduct(user.id)"
                  >
                    Delete
                  </button>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      users: {},
    };
  },
  methods: {
    deleteProduct(id) {
      axios.delete(`/delete/${id}`).then((response) => {
        let i = this.users.map((data) => data.id).indexOf(id);
        this.users.splice(i, 1);
      });
    },
    getUser() {
      axios.get("/list").then((response) => {
        this.users = response.data.users;
      });
    },
  },
  created() {
    this.getUser();
  },
};
</script> 