<template>
  <div class="account-section bg_img" data-background="assets/images/account-bg.jpg">
    <div class="container">
      <div class="account-title text-center">
        <a href="index.html" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span class="d-none d-sm-inline-block">To Cortaly</span></span></a>
        <a href="index.html" class="logo">
          <img src="assets/images/logo/logo.png" alt="logo">
        </a>
      </div>
      <div class="account-wrapper">
        <div class="account-body">
          <h4 class="title mb-20">Welcome To URL Shorter</h4>
         <ValidationObserver ref="form" v-slot="{handleSubmit}" @submit.prevent>
             <form class="account-form" @submit.prevent="handleSubmit(login)">
                  <div class="form-group">
                    <label for="sign-up">Your Email </label>
                    <ValidationProvider vid="email" name="email" rules="required|email" v-slot="{ errors }">
                      <input type="text" placeholder="Enter Your Email " v-model="email" id="sign-up">
                      <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                    </ValidationProvider>

                  </div>
                  <div class="form-group">
                    <label for="pass">Password</label>
                    <ValidationProvider vid="password" name="password" rules="required|min:8" v-slot="{ errors }">
                      <input type="text" placeholder="Enter Your Password" v-model="password" id="pass">
                      <span class="sign-in-recovery">Forgot your password? <a href="#0">recover password</a></span>
                      <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                    </ValidationProvider>

                  </div>
                  <div class="form-group text-center">
                    <button type="submit" class="mt-2 mb-2" >Sign In</button>
<!--                    <button type="submit" class="mt-2 mb-2"  @click="handleSubmit(login)">Sign In</button>-->
                  </div>
              </form>
         </ValidationObserver>
        </div>
        <div class="or">
          <span></span>
        </div>
        <div class="account-header pb-0">
          <span class="d-block mt-15">Don't have an account? <a href="/register">Sign Up Here</a></span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
  name: "LoginComponent",
    data(){
      return{
        'email': '',
        'password': '',
      }
    },
    methods: {
      login(){
        axios.post('/login',{
          email:this.email,
          password:this.password,
        }).then((ss)=>{
          // console.log(ss)
          location.href = '/dashboard'
        }).catch((error)=>{
          let errorEmail = error.response.data.errors.email[0];
          // let errorPassword ='';
          // if (error.response.data.error.password){
          //    errorPassword = error.response.data.error.password[0];
          // }

          console.log(error.response.data.errors.email[0])
          this.$refs.form.setErrors({
            email: [errorEmail],
            // password: [errorPassword]
          })
        })
      }
    }
  }
</script>

<style scoped>

</style>