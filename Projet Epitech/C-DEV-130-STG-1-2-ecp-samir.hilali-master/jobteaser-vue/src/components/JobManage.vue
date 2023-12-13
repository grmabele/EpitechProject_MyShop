<template>
  <div class="container">
    <div class="row">
      <div v-for="(job, index) in jobs" :key="index" class="col-md-4">
        <div class="single-blog-item">
          <div class="blog-thumnail">
            <a href=""
              ><img src="../assets/index.png" alt="blog-img"
            /></a>
          </div>
          <div class="blog-content">
            <h4>
              <a href="#">{{ job.title }}</a>
            </h4>
            <p>
              {{ job.description }}
            </p>
            <b
              @click="doDelete(job.id)"
              href="#"
              class="more-btn"
              style="background-color: red !important; cursor: pointer"
              >Delete</b
            >
            <a href="#" @click="changeHref(job)" class="more-btn">Edit</a>
          </div>
          <span class="blog-date">{{ job.dedline }}</span>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";

export default {
  name: "jobmanage",
  data() {
    return {
      jobs: [],
    };
  },
  mounted() {
    let url = "http://127.0.0.1:8000/api/job";
    axios
      .get(url)
      .then((response) => {
        let allData = JSON.parse(JSON.stringify(response.data));
        this.jobs = allData.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
  methods: {
    doDelete(id) {
      let conf = confirm("are you sure?");
      if (conf) {
        let url = "http://127.0.0.1:8000/api/job/delete/" + id;
        axios
          .delete(url)
          .then((response) => {
            let allData = JSON.parse(JSON.stringify(response.data));
            if (allData.success == true) {
              alert(allData.message);
              let tmp = this.jobs;
              tmp.map((item, index) => {
                if (id == item.id) {
                  tmp.splice(index, 1);
                }
              });
              this.jobs = tmp;
            }
          })
          .catch((e) => {
            console.log(e);
          });
      }
    },
    changeHref(job) {
      this.$router.push({
        name: "jobedit",
        params: {
          job:job
        },
      });
    },
  },
};
</script>

<style scoped>
img {
  width: 100%;
  height: auto;
}
.single-blog-item {
  border: 1px solid #dfdede;
  box-shadow: 2px 5px 10px #dfdede;
  margin: 15px auto;
  padding: 5px;
  position: relative;
}
.blog-content {
  padding: 15px;
}
.blog-content h4 {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 10px;
  text-transform: uppercase;
}
.blog-content h4 a {
  color: #777;
}
.blog-content p {
  color: #999;
  font-size: 14px;
  font-weight: 300;
  line-height: 1.3333;
}

.blog-date {
  position: absolute;
  background: #337ab7;
  top: 35px;
  left: 5px;
  color: #fff;
  border-radius: 0 25px 25px 0;
  padding: 5px 15px;
  font-weight: 700;
}
.more-btn {
  background: #337ab7;
  border-radius: 2px;
  display: block;
  height: 30px;
  line-height: 30px;
  margin: 30px auto auto auto;
  text-align: center;
  width: 110px;
  color: #f1f1f1;
}
</style>