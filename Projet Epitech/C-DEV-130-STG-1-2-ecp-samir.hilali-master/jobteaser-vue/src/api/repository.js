import api from "./api";

export default {
  createSession() {
    return api.get('http://localhost:8000/sanctum/csrf-cookie');
  },

  login(params) {
    return api.post('http://localhost:8000/api/login', params);
  },

  logout() {
    return api.post('http://localhost:8000/api/logout');
  },

  getPosts() {
    return api.get(`http://localhost:8000/api/jobs`);
  },
};
