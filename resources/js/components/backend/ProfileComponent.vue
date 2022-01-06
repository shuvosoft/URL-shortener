<template>
  <div class="container-fluid">
    <h4 class="page-title">Profile </h4>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div>
            <div class="w3-bar w3-black">
              <button class="w3-bar-item w3-button" @click="openCity('London')" >Profile</button>
              <button class="w3-bar-item w3-button" @click="openCity('Paris')">Password Change</button>
              <button class="w3-bar-item w3-button" @click="openCity('Tokyo')">User Image</button>
            </div>

            <div id="London" class="w3-container city">
              <h2>Profile</h2>
              <ValidationObserver ref="form" v-slot="{handleSubmit}" >
                <form  @submit.prevent="handleSubmit(updateProfile)">
                  <div class="form-group">
                    <label for="name"> Name</label>
                    <ValidationProvider vid="name" name="name" rules="required" v-slot="{ errors }">
                      <input type="text" id="name" v-model="profile.name"  placeholder="Your name..">
                      <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                    </ValidationProvider>
                  </div>
                  <div class="form-group">
                    <label for="email"> Email</label>
                    <ValidationProvider vid="email" name="email" rules="required|email" v-slot="{ errors }">
                       <input type="text" id="email" v-model="profile.email"  placeholder="Your email..">
                      <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                    </ValidationProvider>
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Submit">
                  </div>

                </form>
              </ValidationObserver>
            </div>

            <div id="Paris" class="w3-container city" style="display:none">
              <changePassword></changePassword>
            </div>

            <div id="Tokyo" class="w3-container city" style="display:none">
             <changeImage></changeImage>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import changePassword from "./ChangePasswordComponent"
import changeImage from "./ChangeImageComponent"
export default {
  components:{
    changePassword,
    changeImage
  },
  props:['profile'],
  name: "ProfileComponent",
  methods:{
     openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        }
      document.getElementById(cityName).style.display = "block";
    },
    updateProfile(){
       // alert('ss');
      axios.post('/profile-update',{
        name: this.profile.name,
        email: this.profile.email
      }).then(()=>{
        this.$toaster.success('Successfully Updated !.')
        location.href='/profile'
      }).catch((error)=>{
          var errorEmail = error.response.data.errors.email[0];
          this.$refs.form.setErrors({
            email:[errorEmail]
          });
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