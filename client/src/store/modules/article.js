import axios from 'axios'

const state = {
  articles: {},
  article: null,
  loading: true,
  error: {}
}

const getters = { myArticle: state => state }

const actions = {
  async getArticles({ commit }, pageNum = false) {
    try {
      const res =
        pageNum == false
          ? await axios.get('/api/articles')
          : await axios.get(`/api/articles?page=${pageNum}`)
      commit('GET_ARTICLES', res.data)
    } catch (error) {
      console.log(error.response.data)
      commit('ARTICLE_ERROR', {
        msg: error.response.statusText,
        status: error.response.status
      })
    }
  },

  async deleteArticle({ commit }, articleId) {
    try {
      await axios.delete(`/api/article/${articleId}`)
      commit('DELETE_ARTICLE', articleId)
    } catch (error) {
      console.log(error.response.data)
    }
  }
}

const mutations = {
  GET_ARTICLES: (state, articles) => {
    state.articles = articles
    state.loading = false
  },
  DELETE_ARTICLE: (state, articleId) =>
    (state.articles = {
      ...state.articles,
      data: state.articles.data.filter(article => article.id != articleId)
    }),
  ARTICLE_ERROR: (state, errorInfo) => {
    state.loading = false
    state.error = errorInfo
  }
}

export default { state, getters, actions, mutations }
