<template>
  <div>
    <img v-if="avatar" class="img-thumbnail" style="width: 100px"
    :src="avatar" alt="" >
    <form >
      <div class="form-group">
        <label for="avatar"> Image</label>

          <input type="file" id="avatar" name="avatar" @change="changeImage" placeholder="Your image..">
      </div>
      <div class="form-group">
        <input type="submit" @click.prevent="imageUpload" value="Submit">
      </div>

    </form>
  </div>
</template>

<script>
export default {
  name: "ChangeImageComponent",
  data(){
    return{
      avatar:'',
    }
  },
  methods:{
    changeImage(e){
      var input = e.target;
      // console.log(input.files);
      if (input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = (event)=>{
          // console.log(event.target.result)
          this.avatar = event.target.result
        }
        reader.readAsDataURL(input.files[0])
      }
    },
    imageUpload(){
      axios.post('/image-upload',{
          avatar: this.avatar
      }).then((success)=>{
        // this.$toaster.success('Successfully Uploaded !.')
        // location.href='/profile'
        console.log(success.data)
      }).catch((error)=>{
        console.log(error.data)
        // this.$toaster.error(' Uploaded fail !.')
      })
    }

  }

}
</script>

<style scoped>

</style>