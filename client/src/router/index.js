import Vue from 'vue'
import VueRouter from 'vue-router'
import Articles from '../components/Articles.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Articles
  },
  {
    path: '/page/:pageNum',
    component: Articles
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
