<template>
  <div>
    <header>
      <h2>App Settings</h2>

    </header>
    <div class="tabs-container">
      <div class="tabs">
        <input type="radio" name="tabs" id="tab-1" checked="checked">
        <label for="tab-1">App Setting</label>

        <input type="radio" name="tabs" id="tab-2">
        <label for="tab-2">Url Short Setting</label>

        <input type="radio" name="tabs" id="tab-3">
        <label for="tab-3">Add Setting</label>

        <input type="radio" name="tabs" id="tab-4">
        <label for="tab-4">Email Setting</label>

        <div class="tab">
          <ValidationObserver ref="form" v-slot="{handleSubmit}" >
            <form @submit.prevent="handleSubmit(submitAppSetting)">
              <div class="form-group">
                <label for="app_name">App Name</label>
                <ValidationProvider vid="app_name" name="app_name" rules="required" v-slot="{ errors }">
                  <input type="text" class="form-control" v-model="appSetting.app_name" id="app_name"  placeholder="Enter app name">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
              <div class="form-group">
                <label for="app_title">App Title</label>
                <ValidationProvider vid="app_title" name="app_title" rules="required" v-slot="{ errors }">
                  <input type="text" class="form-control" v-model="appSetting.app_title" id="app_title"  placeholder="Enter app title">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
              <div class="form-group">
                <label for="sologan">Sologan</label>
                <ValidationProvider vid="sologan" name="sologan" rules="required" v-slot="{ errors }">
                  <input type="text" class="form-control" v-model="appSetting.sologan" id="sologan"  placeholder="Enter sologan">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
              <div class="form-group">
                <label for="second_sologan">Second Sologan</label>
                <ValidationProvider vid="sologan" name="second_sologan" rules="required" v-slot="{ errors }">
                  <input type="text" class="form-control" v-model="appSetting.second_sologan" id="second_sologan"  placeholder="Enter second sologan">
                  <span class="invalid-feedback d-block">{{ errors[0] }}</span>
                </ValidationProvider>
              </div>
              <button type="submit"  class="btn btn-primary">Submit</button>
            </form>
          </ValidationObserver>
        </div>
        <div class="tab">
         <urlShortComponent :urlShort="appSetting"></urlShortComponent>
        </div>
        <div class="tab">
        <appAddComponent :addCode="appSetting"></appAddComponent>
        </div>
        <div class="tab">
          <mailSendComponent :sendingE="appSetting"></mailSendComponent>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import urlShortComponent from './UrlShortSettingComponent'
import appAddComponent from './AddCodeComponent'
import mailSendComponent from './EmailSendingComponent'
export default {
  components:{
    urlShortComponent,
    appAddComponent,
   mailSendComponent
  },
  data(){
    return{
      app_name:'',
      app_title:'',
      sologan:'',
      second_sologan:'',
      appSetting:{}
    }
  },
  name: "AppSettingComponent",
  created() {
    this.getAppSetting()
  },
  methods:{
    getAppSetting(){
      axios.get('/app-setting-get',{

      }).then((ss)=>{
        this.appSetting = ss.data
      }).catch((er)=>{

      })
    },
    submitAppSetting(){
      axios.post('/app-setting-store',{
        app_name:this.appSetting.app_name,
        app_title:this.appSetting.app_title,
        sologan:this.appSetting.sologan,
        second_sologan:this.appSetting.second_sologan,
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