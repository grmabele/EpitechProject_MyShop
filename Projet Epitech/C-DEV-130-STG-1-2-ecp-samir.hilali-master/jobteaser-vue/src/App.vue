<template>
  <div id="app">
    <div v-if="loading !== 'success'">
      <h3>Login</h3>
      <p v-if="loading">loading...</p>
      <p v-if="error" style="color:red">{{ error }}</p>

      <div class="form-group">

        <label for="email">email</label>
        <input
            type="text"
            class="form-control"
            id="email"
            required
            v-model="user.email"
            name="title"
        />
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input
            class="form-control"
            id="password"
            required
            v-model="user.password"
            name="location"
        />
      </div>
      <button @click="login2">Login</button>
    </div>
    <div v-if="loading">
      <nav class="navbar navbar-expand navbar-dark bg-dark" >
        <div class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link to="/jobadd" class="nav-link">Add Job</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/jobs" class="nav-link">All Jobs</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/jobmanage" class="nav-link">Admin Panel</router-link>
          </li>
          <li class="nav-item">
            <button @click="logout" class="btn btn-primary">Logout</button>
          </li>
        </div>
      </nav>

      <div class="container mt-3">
        <router-view />
      </div>
    </div>
  </div>

</template>


<script>
import './bootstrap/css/bootstrap.min.css'

import axios from "axios";
import { mapGetters } from 'vuex';
export default {
  name: "app",
  data() {
    return {
      user: {
        name:null,
        email: null,
        password: null
      },
      loading: false,
      error: null
    }
  },
  computed: {
    ...mapGetters({
      authenticated: 'authenticated'
    })
  },

  methods: {
    async logout() {
      this.loading = false;
    },
    login2() {
      var data = {
        name: this.user.name,
        email: this.user.email,
        password: this.user.password,
      };

      let url = "http://127.0.0.1:8000/api/login/";
      axios
          .post(url, data)
          .then((response) => {
            this.loading = response.data.message;
            console.log(response);
            this.submitted = true;
          })
          .catch((e) => {
            console.log(e);
          });
    },
    async login() {
      this.error = null;

      try {
        await this.$store.dispatch('login', this.user);
        await this.$router.push({ name: 'posts' });
      } catch (error) {
        this.error = error;
      } finally {
        this.loading = false;
      }
    }
  }
}
</script>