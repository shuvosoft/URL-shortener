<template>
  <div class="col-md-12">

    <div class="header">
      <p class="category">All Link List</p>
    </div>
    <div class="content table-responsive table-full-width">
      <div class="form-group">
        <input type="text"  class="form-control" placeholder="search your data">
      </div>
      <table class="table table-hover table-striped">
        <thead>
        <th>ID</th>
        <th>Link</th>
        <th>Short Link</th>
        <th>Views</th>
        <th>User</th>
        <th>Date</th>
        </thead>
        <tbody>
          <tr v-for="(link,index) in links.data" :key="index">
            <td>{{ index + 1 }}</td>
            <td>{{ link.link }}</td>
            <td>{{link.hash}}</td>
            <td>{{link.view_count}}</td>
            <td>{{link.user_id}}</td>
            <td>{{link.created_at}}</td>
          </tr>
        </tbody>
      </table>

    </div>

  </div>
</template>

<script>
export default {
  name: "LinkComponent",
  data(){
    return{
      links: {}
    }
  },
  methods:{
    allList(){
      axios.get('/getLinks',{

      }).then((ss)=>{
        this.links = ss.data
        // console.log(this.links)
      }).catch((err)=>{

      })
    }
  }
}
</script>

<style scoped>

</style>