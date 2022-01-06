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
        <h3 class="cate">SHORTEN URLS AND</h3>
        <h1 class="title">Earn Money</h1>
        <p>Transforming long, ugly links into Shorten URLs and earn big money. Get paid by every person who visits your URLs.</p>
      </div>
      <div class="banner-form-group">

        <h3 class="subtitle">Shorten URL Is Just Simple</h3>
        <form class="banner-form">
          <input type="text" placeholder="Your URL here" name="url" required>
          <button type="submit">Shorten <i class="flaticon-startup"></i></button>
        </form>

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
name: "SlideComponent"
}
</script>

<style scoped>

</style>