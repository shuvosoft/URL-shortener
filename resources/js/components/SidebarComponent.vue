<template>
  <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">

    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
          Creative Tim
        </a>
      </div>
      <ul class="nav">
        <li class="nav-item active">
          <a class="nav-link" href="/dashboard">
            <i class="nc-icon nc-chart-pie-35"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="/links">
            <i class="nc-icon nc-circle-09"></i>
            <p>Links</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="/user-list">
            <i class="nc-icon nc-notes"></i>
            <p>User List</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="/profile">
            <i class="nc-icon nc-circle-09"></i>
            <p> Profile Update</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="/settings">
            <i class="nc-icon nc-notes"></i>
            <p>Web Settings</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="/app-setting">
            <i class="nc-icon nc-notes"></i>
            <p> Settings</p>
          </a>
        </li>

      </ul>
    </div>
  </div>

</template>

<script>
export default {
  name: "SidebarComponent"
}
</script>

<style scoped>

</style>