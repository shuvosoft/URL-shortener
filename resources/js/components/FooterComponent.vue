<template>
  <footer class="footer-section padding-top">
    <div class="footer-bg bg_img" data-background="assets/images/footer/footer-bg.jpg"></div>
    <div class="footer-bg d-md-block d-none"><img src="assets/images/footer/wave.png" alt="footer"></div>
    <div class="container">
      <div class="section-header cl-white-499">
        <h5 class="cate">Contact Us</h5>
        <h2 class="title">Get in touch!</h2>
        <p>We thrive to ensure that you get the most out of your experience</p>
      </div>
      <form class="contact-form" id="contact_form_submit">
        <div class="form-group">
          <label for="name">Your Full Name</label>
          <input type="text" name="name" id="name" placeholder="Enter Your Full Name">
        </div>
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="text" name="email" id="email" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message" placeholder="Enter Your Message"></textarea>
        </div>
        <div class="form-group check-group">
          <input type="checkbox" id="check" required>
          <label for="check">I agree to receive emails, newsletters and promotional messages</label>
        </div>
        <div class="form-group text-center">
          <button type="submit">Send Message</button>
        </div>
      </form>
      <div class="footer-top">
        <div class="logo">
          <a href="index.html">
            <img src="assets/images/logo/footer-logo.png" alt="logo">
          </a>
        </div>
        <ul class="links">
          <li>
            <a href="#0"><img src="assets/images/footer/neteller.png" alt="footer"></a>
          </li>
          <li>
            <a href="#0"><img src="assets/images/footer/skrill.png" alt="footer"></a>
          </li>
          <li>
            <a href="#0"><img src="assets/images/footer/paypal.png" alt="footer"></a>
          </li>
        </ul>
      </div>
      <div class="footer-bottom">
        <div class="footer-bottom-area">
          <div class="left cl-white">
            <p>{{app_config.footer_text}}</p>
          </div>
          <ul class="social-icons">
            <li>
              <a :href="app_config.fb_link" class="active">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a :href="app_config.youtube_link" class="">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li>
              <a :href="app_config.linkedin_link" class="">
                <i class="fab fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a :href="app_config.instagram_link" class="">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</template>

<script>
export default {
  props:['app_config'],
  name: "FooterComponent"
}
</script>

<style scoped>

</style>