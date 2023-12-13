<template>
  <div class="submit-form">
    <div>
      <div class="form-group">
        <label for="title">title</label>
        <input
          type="text"
          class="form-control"
          id="title"
          required
          v-model="job.title"
          name="title"
        />
      </div>

      <div class="form-group">
        <label for="location">location</label>
        <input
          class="form-control"
          id="location"
          required
          v-model="job.location"
          name="location"
        />
      </div>

      <div class="form-group">
        <label for="work_type">work_type</label>
        <input
          class="form-control"
          id="work_type"
          required
          v-model="job.work_type"
          name="work_type"
        />
      </div>

      <div class="form-group">
        <label for="description">description</label>
        <input
          class="form-control"
          id="description"
          required
          v-model="job.description"
          name="description"
        />
      </div>

      <div class="form-group">
        <label for="experience">experience</label>
        <input
          class="form-control"
          id="experience"
          required
          v-model="job.experience"
          name="experience"
        />
      </div>

      <div class="form-group">
        <label for="dedline">dedline</label>
        <input
          class="form-control"
          id="dedline"
          required
          v-model="job.dedline"
          name="dedline"
        />
      </div>

      <button @click="updateJob" class="btn btn-success">Submit</button>
    </div>

  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "jobedit",
  data() {
    return {
      job: {
      },
    };
  },
  methods: {
    updateJob() {
      let job = this.$route.params.job;
      let url = "http://127.0.0.1:8000/api/job/update/"+job.id;
      var data = {
        title: this.job.title,
        location: this.job.location,
        work_type: this.job.work_type,
        description: this.job.description,
        experience: this.job.experience,
        dedline: this.job.dedline,
      };      
      axios
        .post(url,data)
        .then((response) => {
          let allData = JSON.parse(JSON.stringify(response.data));
          if(allData.success==true){
            alert(allData.message);
          }  
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },

  created(){
    this.job = this.$route.params.job;
  }
};
</script>

<style>
.submit-form {
  max-width: 300px;
  margin: auto;
}
</style>
