import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';

import './style.css';

import FilmList from './components/FilmList.vue'
import Tickets from './components/Tickets.vue'
import FilmProjection from './components/FilmProjection.vue'
import CreateFilm from './components/CreateFilm.vue'
import CreateProjections from './components/CreateProjections.vue'

Vue.use(VueRouter);

const routes = [
  {
    path: "/home",
    name: "film_list",
    component: FilmList,
  },
  {
    path: "/mytickets",
    name: "my_ticket",
    component: Tickets
  },
  {
    path: "/projection/:id",
    name: "film_projection",
    component: FilmProjection
  },
  {
    path:"/create/film",
    name:"create_film",
    component:CreateFilm,
  },
  {
    path:"/create/projections",
    name:"create_projections",
    component:CreateProjections,
  },
  {
    path: "",
    redirect: "/home"
  }
];

const router = new VueRouter ({
  mode: "history",
  routes
});

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
