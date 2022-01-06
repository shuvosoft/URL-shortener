
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
          <h4 class="title mb-20">Registration</h4>
          <ValidationObserver ref="form" v-slot="{handleSubmit}">
             <form method="POST" action="" @submit.prevent="handleSubmit(submitForm)">
            <div class="row mb-3">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                <ValidationProvider name="name" rules="required" v-slot="{ errors }">
                  <input id="name" type="text" class="form-control"  v-model="name" value="" required autocomplete="name" autofocus>
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
            </div>

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

              <div class="col-md-6">
                <ValidationProvider vid="email" name="email" rules="required|email" v-slot="{ errors }">
                  <input id="email" type="email" class="form-control " v-model="email" value="" required autocomplete="email">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

              <div class="col-md-6">
                <ValidationProvider name="password" rules="required|min:8" v-slot="{ errors }">
                  <input id="password" type="password" class="form-control" v-model="password"  autocomplete="new-password">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
            </div>

            <div class="row mb-3">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

              <div class="col-md-6">
                <ValidationProvider name="password-confirm" rules="required|confirmed:password" v-slot="{ errors }">
                <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation"  autocomplete="new-password">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" >
<!--                <button type="submit" class="btn btn-primary" @click.prevent="submitForm">-->
                  Register
                </button>
              </div>
            </div>
          </form>
          </ValidationObserver>
        </div>
        <div class="or">
          <span>OR</span>
        </div>
        <div class="account-header pb-0">
          <span class="d-block mb-30 mt-2">Sign up with your work email</span>
          <a href="#0" class="sign-in-with"><img src="assets/images/icon/google.png" alt="icon"><span>Sign Up with Google</span></a>
          <span class="d-block mt-15">Don't have an account? <a href="/login">Sign In Here</a></span>
        </div>
      </div>
    </div>
  </div>
</template>




<script>
  export default {
  name: "RegisterComponent",
    data(){
      return{
        'name' : '',
        'email' : '',
        'password' : '',
        'password_confirmation' : '',
      }
    },
    mounted() {
    console.log('load mounted')
    },
    methods:{
        submitForm(){
            // console.log(this.name)
          axios.post('/register',{
            name                 :this.name,
            email                :this.email,
            password             :this.password,
            password_confirmation:this.password_confirmation,
          }).then((rs)=>{
            location.href='/dashboard'
          }).catch((error)=>{
            let emailCheck = error.response.data.errors.email[0];
            console.log(error.response.data.errors.email[0])
            this.$refs.form.setErrors({
              email: [emailCheck]
            })
          })
        }
    }
  }
</script>

<style scoped>

</style>