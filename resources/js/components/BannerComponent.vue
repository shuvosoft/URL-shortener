<template>
  <section class="banner-section">
    <div class="banner-bg bg_img" data-background="assets/images/banner/banner-bg.jpg">
      <div class="banner-bg-shape"><img src="assets/images/banner/banner-shape.png" alt="banner"></div>
      <div class="round-1">
        <img src="assets/images/banner/01.png" alt="banner">
      </div>
      <div class="round-2">
        <img src="assets/images/banner/02.png" alt="banner">
      </div>
    </div>
    <div class="container">
      <div class="banner-content">
        <h3 class="cate">{{banner.app_title}}</h3>
        <h1 class="title">{{banner.sologan}}</h1>
        <p>{{banner.second_sologan}}</p>
      </div>
      <div class="banner-form-group">

        <h3 class="subtitle">Shorten URL Is Just Simple</h3>
        <form class="banner-form" @click.prevent="shortUrl">
          <input type="text" placeholder="Your URL here" name="url" v-model="url" required>

          <button type="submit">Shorten <i class="flaticon-startup"></i></button>
          <div v-if="error" class="text-danger">{{error}} </div>
<!--          {{getLink}}-->
        </form>
        <div class="container margin-top-20">
          <div v-if="getLink" class="row bg-white margin-top-20 py-3">

            <div class="col-md-6 text-black-50">
              <a :href="getLink.link" target="_blank">{{getLink.link}}</a>
            </div>

            <div class="col-md-6" v-if="getLink.hash">
              <a :href="'http://127.0.0.1:8000/'+getLink.hash" target="_blank"><span style="color: red">Your New Short Link :  </span>http://127.0.0.1:8000/{{getLink.hash}}</a>
              <span class="btn btn-primary cursor-pointer"><a>Copy</a></span>
            </div>
<!--            <input  v-if="getLink" type="text" placeholder="Your URL here" name="url"  required>-->

          </div>

        </div>

        <div class="banner-counter">
          <div class="counter-item">
            <h2 class="counter-title"><span class="counter">1,200,000</span>+</h2>
            <p>Links clicked per day</p>
          </div>
          <div class="counter-item">
            <h2 class="counter-title"><span class="counter">348,000,000</span>+</h2>
            <p>Shortened links in total</p>
          </div>
          <div class="counter-item">
            <h2 class="counter-title"><span class="counter">1,180,000</span>+</h2>
            <p>Happy users registered</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props:['banner'],
name: "SlideComponent",
  data(){
    return{
      url: null,
      error: null,
      getLink:{}
    }
  },
  methods:{
    shortUrl(){
      if (this.url && this.url !== ''){
        this.error = null
        axios.post('/short-url',{
          url: this.url
        }).then((ss)=>{
          this.getLink = ss.data.data
          // console.log(ss.data)
          this.$toaster.success('Successfully Insert !.')
          // location.href='/settings'
        }).catch((err)=>{
          console.log(err.data)
          this.$toaster.error(' Insert fail !.')
        })
      }else {
        this.error = 'This Field Is Required'
      }
    }
  }
}
</script>

<style scoped>

</style>