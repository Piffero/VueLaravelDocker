<template>
  <div id="app">
    <nav class="navbar navbar-expand navbar-light" style="background-color: #e3f2fd;">
      <router-link to="/" class="navbar-brand ms-1"><strong>HOME</strong></router-link>
      <div class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link to="/customers" class="btn btn-success btn-sm ms-1">Customers</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/customers/add" class="btn btn-success btn-sm ms-1"><i class="fa fa-plus"></i> Add</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/customers/upload" class="btn btn-success btn-sm ms-1"><i class="fa fa-upload"></i> Upload</router-link>
        </li>
      </div>
    </nav>

    <div class="container mt-3">
      <router-view />
    </div>
  </div>
</template>

<script>
export default {
  name: "app"
};
</script>