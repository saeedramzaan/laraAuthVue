<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">User List</div>
          <div class="card-body">
            <div class="card-body">
              <p id="success"></p>
              <form @submit.prevent="addNewPost()" method="put">
                <input type="text" name="title" v-model="user.title" />
                <input type="text" name="desc" v-model="user.desc" />
                <input type="submit" value="Submit" />
              </form>
            </div>
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
      user: {},
      editedItem: {},
      title: "",
      desc: "",
    };
  },
  methods: {
    addNewPost() {
      var id = window.location.pathname.split("/")[2];
      axios
        .put(`/update/${id}`, { title: this.user.title, desc: this.user.desc })
        .then((response) => {
          $("#success").html(response.data.message);
        });
    },
    getUser() {
      var id = window.location.pathname.split("/")[2];
      axios.get(`/editInfo/${id}`).then((response) => {
        this.user = response.data.user;
      });
    },
  },
  created() {
    this.getUser();
  },
};
</script>