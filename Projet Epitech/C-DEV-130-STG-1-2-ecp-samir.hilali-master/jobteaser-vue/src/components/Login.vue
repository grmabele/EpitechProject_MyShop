<template>
  <div>
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
    <button @click="saveJob">Login</button>
    <p>{{success}}</p>
  </div>
</template>

<script>

import axios from "axios";

export default {
  name: 'Login',

  data() {
    return {
      user: {
        email: null,
        password: null
      },
      loading: false,
      error: null
    }
  },

  methods: {
    saveJob() {
      var data = {
        "name": "oazz7",
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
