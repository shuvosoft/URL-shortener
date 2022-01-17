<template>
  <header class="header-section" style="background: rebeccapurple;margin-top: -5px;">
    <div class="container">
      <div class="header-wrapper">
        <div class="logo">
          <a href="home">
           <span> <img src="assets/images/logo/logo.png" alt="logo"></span><span>{{app_config.app_name}}</span>
          </a>
        </div>
        <ul class="menu">
          <li class="d-sm-none text-center">
            <a href="/login" class="header-button active">Login</a>
          </li>
          <li class="d-sm-none text-center">
            <a href="/register" class="mb-4 header-button">Register</a>
          </li>
        </ul>
        <div class="header-bar d-lg-none mr-sm-3">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="header-right">
<!--          <a href="home" class="header-button d-none d-sm-inline-block m-0 active">Home</a>-->
          <a href="/login" class="header-button d-none d-sm-inline-block m-0 active">Login</a>
          <a href="/register" class="header-button d-none d-sm-inline-block m-0">Register</a>
        </div>
        <div v-if="user !== 'null'" class="dropdown">
          <span>{{user.name}}</span>
          <div class="dropdown-content">
            <a href="#" @click="logout">LogOut</a>

          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
  export default {
  name: "NavbarComponent",
    props:['user','app_config'],
    mounted() {
      // console.log(this.user,'sssssssssss')
    },
    methods:{
      logout(){
        axios.post('/logout',{

        }).then((res)=>{
          location.href ='/';
        }).catch((error)=>{

        })
      }
    }
  }
</script>

<style scoped>
.dropdown {
  position: relative;
  display: inline-block;

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>