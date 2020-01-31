import Vue from 'vue'
import Vuex from 'vuex'
import article from './modules/article'

// Load Vuex
Vue.use(Vuex)

// Create Store
const myStore = new Vuex.Store({
  modules: {
    myArticle: article
  }
})

export default myStore
