import Vue from "vue";
import Router from "vue-router";
import JobList from './components/JobList';
import JobSingle from './components/JobSingle';
import JobManage from './components/JobManage';
import JobAdd from './components/JobAdd';
import JobEdit from './components/JobEdit';
import Login from "@/components/Login";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/jobs",
      name: "jobs",
      component: JobList      
    },
    {
      path: "/jobmanage",
      name: "jobmanage",
      component: JobManage      
    },    
    {
      path: "/jobadd",
      name: "jobadd",
      component: JobAdd
    },
    {
      path: "/jobedit",
      name: "jobedit",
      component: JobEdit
    },
    {
      path: "/jobsingle",
      name: "jobsingle",
      component: JobSingle
    },
    {
      path: "/login",
      name: "login",
      component: Login
    }
  ]
});
