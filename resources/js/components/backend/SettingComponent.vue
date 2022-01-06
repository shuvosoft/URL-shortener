<template>
  <div>
    <header>
      <h2>Web Settings</h2>

    </header>
    <div class="tabs-container">
      <div class="tabs">
        <input type="radio" name="tabs" id="tab-1" checked="checked">
        <label for="tab-1">Manage Social</label>

        <input type="radio" name="tabs" id="tab-2">
        <label for="tab-2">Manage Footer</label>

        <input type="radio" name="tabs" id="tab-3">
        <label for="tab-3">Manage Contract Us</label>
        <div class="tab">
          <ValidationObserver ref="form" v-slot="{handleSubmit}" >
            <form @submit.prevent="handleSubmit(submitSocial)">
              <div class="form-group">
                <label for="fb_link">Facebook Link</label>
                <ValidationProvider vid="fb_link" name="fb_link" rules="required" v-slot="{ errors }">
                  <input type="text" class="form-control" v-model="settings.fb_link" id="fb_link"  placeholder="Enter Facebook Link">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
              <div class="form-group">
                <label for="youtube_link">Youtube Link</label>
                <ValidationProvider vid="youtube_link" name="youtube_link" rules="required" v-slot="{ errors }">
                   <input type="text" class="form-control" v-model="settings.youtube_link" id="youtube_link"  placeholder="Enter Youtube Link">
                   <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
              <div class="form-group">
                <label for="linkedin_link">Linkedin Link</label>
                <ValidationProvider vid="linkedin_link" name="linkedin_link" rules="required" v-slot="{ errors }">
                  <input type="text" class="form-control" v-model="settings.linkedin_link" id="linkedin_link"  placeholder="Enter Linkedin Link">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
              <div class="form-group">
                <label for="linkedin_link">Instagram Link</label>
                <ValidationProvider vid="instagram_link" name="instagram_link" rules="required" v-slot="{ errors }">
                   <input type="text" class="form-control" v-model="settings.instagram_link" id="instagram_link"  placeholder="Enter Instagram Link">
                    <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>

              <button type="submit"  class="btn btn-primary">Submit</button>
            </form>
          </ValidationObserver>
        </div>
        <div class="tab">
          <webFooterSetting :footer="settings"></webFooterSetting>
        </div>
        <div class="tab">
          <webContractUs :contract="settings"></webContractUs>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import webFooterSetting from './WebFooterComponent'
import webContractUs from './ContractUsComponent'
export default {
  components:{
    webFooterSetting,
    webContractUs
  },
  name: "SettingComponent",
  data(){
    return{
      fb_link:'',
      youtube_link:'',
      linkedin_link:'',
      instagram_link:'',
      settings:{}
    }
  },
  created() {
    this.getSettings()
  },
  methods:{
    getSettings(){
      axios.get('/get_setting',{

      }).then((ss)=>{
        this.settings = ss.data
      }).catch((er)=>{

      })
    },
    submitSocial(){
      axios.post('/web_setting',{
        fb_link       : this.settings.fb_link,
        youtube_link  : this.settings.youtube_link,
        linkedin_link : this.settings.linkedin_link,
        instagram_link: this.settings.instagram_link,
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
body section header {
  padding: 2.5rem 4rem;
  font-size: 1.75rem;
}

body section header h2 {
  margin-bottom: 1.5rem;
  font-size: 3rem;
}

body section header p {
  margin: 0;
}

body section header p + p {
  margin-top: 1rem;
}

/* Tabs Area */

body section .tabs-container {
  padding: 4rem 2.5rem 2.5rem;
  background-color: #FFFFFF;
  border-radius: 50px;
}

.tabs-container .tabs .tab, .tabs-container .tabs input[type=radio] {
  display: none;
}

.tabs-container .tabs input[type=radio] + label {
  display: inline-block;
  margin: 0;
  padding: 0.5rem 1.5rem;
  font-size: 1.5rem;
  opacity: 0.6;
  cursor: pointer;
  user-select: none;
}

.tabs-container .tabs input[type=radio]:checked + label {
  border-bottom: 2px solid #000;
  opacity: 1;
}

.tabs-container .tabs .tab {
  margin: 0;
  padding: 2rem 0;
  border-top-width: 2px;
  border-top-style: solid;
  border-color: #000000;
}

.tabs input:first-of-type:checked + label ~ .tab:first-of-type,
.tabs input:nth-of-type(2):checked + label ~ .tab:nth-of-type(2),
.tabs input:nth-of-type(3):checked + label ~ .tab:nth-of-type(3) {
  display: block;
}

.tabs-container .tabs .tab ul {
  display: grid;
  margin: 0;
  padding: 0;
  width: 100%;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: repeat(auto-fill, minmax(auto, 1fr));
  grid-auto-flow: row;
  justify-content: center;
  list-style: none;
}

.tabs-container .tabs .tab ul li {
  margin: 1rem;
  padding: 2rem;
  border: 1px solid #000000;
  border-radius: 4px;
  aspect-ratio: 3 / 2;
}

.tabs-container .tabs .tab p {
  margin: 1.5rem;
}
</style>