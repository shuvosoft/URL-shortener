<template>
  <nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
      <a class="navbar-brand" href="#pablo"> Dashboard </a>
      <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar burger-lines"></span>
        <span class="navbar-toggler-bar burger-lines"></span>
        <span class="navbar-toggler-bar burger-lines"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="dropdown">
              <i class="nc-icon nc-palette"></i>
              <span class="d-lg-none">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="no-icon"> <img class="user_image" :src="'user_image/'+user.avatar" alt="img">{{user.name}}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pablo" @click="logout">
              <span class="no-icon">Log out</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "NavbarComponent",
  props:['user'],
  methods:{
    logout(){
      axios.post('/logout',{

      }).then((ss)=>{
        location.href='/';
      }).catch((err)=>{

      });
    }
  }
}
</script>

<style scoped>
.user_image{
  width: 25px;
  height: 25px;

}
</style>