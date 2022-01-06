<template>
  <ValidationObserver ref="form" v-slot="{handleSubmit}" >
    <form @submit.prevent="handleSubmit(submitUrlShort)">
      <div class="form-check form-check-inline" style="margin-left: 10%;">
        <input
            class="form-check-input"
            type="radio"
            v-model="urlShort.redirect_status"
            id="inlineRadio1"
            value="enable"
        />
        <label class="form-check-label" for="inlineRadio1">Enable</label>
      </div>

      <div class="form-check form-check-inline" style="margin-left: 3%;">
        <input
            class="form-check-input"
            type="radio"
            v-model="urlShort.redirect_status"
            id="inlineRadio2"
            value="disable"
        />
        <label class="form-check-label" for="inlineRadio2">Disable</label>
      </div>
      <div class="form-check form-check-inline" style="margin-left: 3%;">
        <input
            class="form-check-input"
            type="radio"
            v-model="urlShort.redirect_status"
            id="enable_for_guest"
            value="option2"
        />
        <label class="form-check-label" for="inlineRadio2">Enable for guest user</label>
      </div>
      <br>
      <br>
      <br>
      <button type="submit"  class="btn btn-primary">Submit</button>
    </form>
  </ValidationObserver>
</template>

<script>
export default {
  props:['urlShort'],
  data(){
    return{
      redirect_status:''
    }
  },
  name: "UrlShortSettingComponent",
  methods:{
    submitUrlShort(){
      axios.post('/app-url-store',{
        redirect_status: this.urlShort.redirect_status
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