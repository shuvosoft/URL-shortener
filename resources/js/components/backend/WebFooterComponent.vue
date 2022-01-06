<template>
  <ValidationObserver ref="form" v-slot="{handleSubmit}" >
    <form @submit.prevent="handleSubmit(submitFooterText)">
      <div class="form-group">
        <label for="footer_text">Footer Text</label>
        <ValidationProvider vid="footer_text" name="footer_text" rules="required" v-slot="{ errors }">
          <input type="text" class="form-control" v-model="footer.footer_text" id="footer_text"  placeholder="Enter Footer Text">
          <span class="invalid-feedback d-block">{{ errors[0] }}</span>
        </ValidationProvider>
      </div>

      <button type="submit"  class="btn btn-primary">Submit</button>
    </form>
  </ValidationObserver>
</template>

<script>
export default {
  props:['footer'],
  name: "WebFooterComponent",
  data(){
    return{
      footer_text:''
    }
  },
  methods:{
    submitFooterText(){
      axios.post('/footer',{
        footer_text: this.footer.footer_text
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