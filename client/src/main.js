import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';

import './style.css';

import FilmList from './components/FilmList.vue'
import Tickets from './components/Tickets.vue'
import FilmProjection from './components/FilmProjection.vue'

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
