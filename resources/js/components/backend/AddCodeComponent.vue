<template>
  <ValidationObserver ref="form" v-slot="{handleSubmit}" >
      <form @submit.prevent="handleSubmit(submitAddCode)">
        <div class="form-group">
          <label for="popup_add">PopUp Add code</label>
          <ValidationProvider vid="popup_add" name="popup_add" rules="required" v-slot="{ errors }">
            <input type="text" class="form-control" v-model="addCode.popup_add" id="popup_add"  placeholder="Enter PopUp add">
            <span class="invalid-feedback d-block">{{ errors[0] }}</span>
          </ValidationProvider>
        </div>
        <div class="form-group">
          <label for="tops_add">Top Add code</label>
          <ValidationProvider vid="tops_add" name="tops_add" rules="required" v-slot="{ errors }">
            <input type="text" class="form-control"  v-model="addCode.tops_add" id="tops_add" placeholder="Enter top add">
          </ValidationProvider>
        </div>

        <div class="form-group">
          <label for="bottom_add">bottom add code</label>
          <ValidationProvider vid="bottom_add" name="bottom_add" rules="required" v-slot="{ errors }">
            <textarea type="text" class="form-control" v-model="addCode.bottom_add" id="bottom_add"  placeholder="Enter bottom add"></textarea>
            <span class="invalid-feedback d-block">{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <button type="submit"  class="btn btn-primary">Submit</button>
      </form>
  </ValidationObserver>
</template>

<script>
export default {
  props:['addCode'],
  data(){
    return{
      popup_add:'',
      tops_add:'',
      bottom_add:''
    }
  },
  name: "AddCodeComponent",
  methods:{
    submitAddCode(){
      axios.post('/app-add-store',{
        popup_add: this.addCode.popup_add,
        tops_add: this.addCode.tops_add,
        bottom_add: this.addCode.bottom_add
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