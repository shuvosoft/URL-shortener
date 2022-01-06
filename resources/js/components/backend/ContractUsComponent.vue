<template>
  <ValidationObserver ref="form" v-slot="{handleSubmit}" >
    <form @submit.prevent="handleSubmit(submitContractInfo)">
      <div class="form-group">
        <label for="email">Email</label>
        <ValidationProvider vid="email" name="email" rules="required" v-slot="{ errors }">
          <input type="email" class="form-control" v-model="contract.email" id="email"  placeholder="Enter email">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>
      <div class="form-group">
        <label for="phn_number">Phone Number</label>
        <ValidationProvider vid="phn_number" name="phn_number" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="contract.phn_number" id="phn_number"  placeholder="Enter phn number">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>

      <button type="submit"  class="btn btn-primary">Submit</button>
    </form>
  </ValidationObserver>
</template>

<script>
export default {
  props:['contract'],
  name: "ContractUsComponent",
  data(){
    return{
      email:'',
      phn_number:''
    }
  },
  methods:{
    submitContractInfo(){
      axios.post('/contract',{
        email     : this.contract.email,
        phn_number: this.contract.phn_number
      }).then((ss)=>{
        this.$toaster.success('Successfully Updated !.')
      }).catch((err)=>{
        this.$toaster.error(' Insert fail !.')
      })
    }
  }
}
</script>

<style scoped>

</style>