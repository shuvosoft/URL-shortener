<template>
  <div class="col-md-12">

      <div class="header">
        <p class="category">All User List</p>
      </div>
      <div class="content table-responsive table-full-width">
        <div class="form-group">
          <input type="text" v-model="search" @keyup="userList" class="form-control" placeholder="search your data">
        </div>
        <table class="table table-hover table-striped">
          <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Avatar</th>
          <th>Action</th>
          </thead>
          <tbody>
          <tr v-for="(user,index) in users.data" :key="index">
            <td>{{index + 1}}</td>
            <td>{{user.name}}</td>
            <td>s</td>
            <td>s</td>
            <td>s</td>
          </tr>

          </tbody>
        </table>

      </div>

    <div class="card-title">
      <pagination :data="users" @pagination-change-page="userList"></pagination>
    </div>
  </div>

</template>

<script>
export default {
  data(){
    return{
      users: {},
      search: ''
    }
  },
  name: "UsarListComponent",
  created() {
    this.userList()
  },
  methods:{
    userList(page = 1){
      axios.get('/user-all?page=' + page+'&search='+this.search)
          .then((ss)=>{
          this.users = ss.data
          // console.log(this.users )
      }).catch((err)=>{

      })
    }
  }
}
</script>

<style scoped>

</style>