<template>
  <div class="container-fluid">
<!--    <h4 class="page-title">Change Password </h4>-->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <ValidationObserver ref="form" v-slot="{handleSubmit}" >
              <form  @submit.prevent="handleSubmit(changePassword)">
                  <div class="form-group">
                    <label for="old_password"> password</label>
                    <ValidationProvider vid="old_password" name="old_password" rules="required" v-slot="{ errors }">
                      <input type="password" id="old_password" v-model="old_password"  placeholder="Your old_password..">
                      <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                    </ValidationProvider>
                  </div>
                  <div class="form-group">
                    <label for="password">  password</label>
                    <ValidationProvider vid="password" name="password" rules="required" v-slot="{ errors }">
                      <input type="password" id="password"  v-model="password" placeholder="New password..">
                      <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                    </ValidationProvider>
                  </div>
                  <div class="form-group">
                    <label for="password_confirm"> Email</label>
                    <ValidationProvider vid="password_confirm" name="password_confirm" rules="required|confirmed:password" v-slot="{ errors }">
                      <input type="password" id="password_confirm" v-model="password_confirm"  placeholder="password confirm..">
                      <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                    </ValidationProvider>
                  </div>
                <div class="form-group">
                  <input type="submit"  value="Submit">
                </div>

            </form>
          </ValidationObserver>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  data(){
   return{
     old_password:'',
     password:'',
     password_confirm:''

   }
  },
  name: "ChangePasswordComponent",
  methods:{
    changePassword(){
     axios.post('/password-update', {
       old_password    : this.old_password,
       password        : this.password,
       password_confirm: this.password_confirm,
     }).then((ss)=>{
       this.$toaster.success('Successfully Updated !.')
       location.href='/profile'
     }).catch((err)=>{
       this.$toaster.error(' Update fail !.')

     })
    }
  }
}
</script>

<style scoped>
input[type=text], select {
  width: 100%;
  padding: 5px 20px;
  margin: 5px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>