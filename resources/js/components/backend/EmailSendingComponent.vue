<template>
  <ValidationObserver ref="form" v-slot="{handleSubmit}" >
    <form @submit.prevent="handleSubmit(sendEmailData)">
      <div class="form-group">
        <label for="email_from_name">Email From Name</label>
        <ValidationProvider vid="email_from_name" name="email_from_name" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="sendingE.email_from_name" id="email_from_name"  placeholder="Email From Name">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>
      <div class="form-group">
        <label for="mail_from_address">Mail From Address</label>
        <ValidationProvider vid="mail_from_address" name="mail_from_address" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control"  v-model="sendingE.mail_from_address" id="mail_from_address" placeholder="Mail From Address">
        </ValidationProvider>
      </div>

      <div class="form-group">
        <label for="email_smtp_host">Mail Host</label>
        <ValidationProvider vid="email_smtp_host" name="email_smtp_host" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="sendingE.email_smtp_host" id="email_smtp_host"  placeholder="Mail Host">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>
      <div class="form-group">
        <label for="email_port">Mail Port</label>
        <ValidationProvider vid="email_port" name="email_port" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="sendingE.email_port" id="email_port"  placeholder="Mail Port">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>
      <div class="form-group">
        <label for="email_driver">Mail Driver</label>
        <ValidationProvider vid="email_driver" name="email_driver" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="sendingE.email_driver" id="email_driver"  placeholder="Mail Port">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>
      <div class="form-group">
        <label for="email_user_Name">Mail User Name</label>
        <ValidationProvider vid="email_user_Name" name="email_user_Name" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="sendingE.email_user_Name" id="email_user_Name"  placeholder="Mail User Name">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>

      <div class="form-group">
        <label for="email_password">Mail Password</label>
        <ValidationProvider vid="email_password" name="email_password" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="sendingE.email_password" id="email_password"  placeholder="Mail Password">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>
      <div class="form-group">
        <label for="email_encryption_type">Mail Encryption type</label>
        <ValidationProvider vid="email_encryption_type" name="email_encryption_type" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="sendingE.email_encryption_type" id="email_encryption_type"  placeholder="Mail Encryption type">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>

      <button type="submit"  class="btn btn-primary">Submit</button>
    </form>
  </ValidationObserver>
</template>

<script>
export default {
  props:['sendingE'],
  name: "EmailSendingComponent",
  data(){
    return{
      email_from_name:'',
      mail_from_address:'',
      email_smtp_host:'',
      email_port:'',
      email_driver:'',
      email_user_Name:'',
      email_password:'',
      email_encryption_type:''
    }
  },
  methods:{
    sendEmailData(){
    axios.post('/app-emailSend-store',{
      email_from_name      : this.sendingE.email_from_name,
      mail_from_address    : this.sendingE.mail_from_address,
      email_smtp_host      : this.sendingE.email_smtp_host,
      email_port           : this.sendingE.email_port,
      email_driver         : this.sendingE.email_driver,
      email_user_Name      : this.sendingE.email_user_Name,
      email_password       : this.sendingE.email_password,
      email_encryption_type: this.sendingE.email_encryption_type
    }).then((ss)=>{
      this.$toaster.success('Successfully Updated !.')
      // location.href='/settings'
    }).catch((err)=>{
      this.$toaster.error(' Insert fail !.')
    })
    }
  }

}
</script>

<style scoped>

</style>