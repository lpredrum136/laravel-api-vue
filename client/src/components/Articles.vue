<template>
  <b-container>
    <p v-if="myArticle.loading">Loading...</p>
    <template v-else>
      <ArticleForm />
      <hr />
      <div class="overflow-auto">
        <b-pagination-nav
          :link-gen="linkGen"
          :number-of-pages="myArticle.articles.meta.last_page"
          use-router
        ></b-pagination-nav>
      </div>
      <b-card-group deck>
        <ArticleItem
          v-for="article in myArticle.articles.data"
          :key="article.id"
          :article="article"
        />
      </b-card-group>
    </template>
    <hr />
  </b-container>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import ArticleForm from './ArticleForm'
import ArticleItem from './ArticleItem'

export default {
  name: 'Articles',
  components: { ArticleForm, ArticleItem },
  computed: mapGetters(['myArticle']),
  methods: {
    ...mapActions(['getArticles']),
    linkGen(pageNum) {
      // return pageNum === 1 ? '?' : `?page=${pageNum}`
      return pageNum == 1 ? { path: '/' } : { path: `/page/${pageNum}` }
    }
  },
  watch: {
    $route(to, from) {
      // console.log(to.params.pageNum)
      this.getArticles(to.params.pageNum)
    }
  },
  created() {
    if (!this.$route.params.pageNum) this.getArticles()
    else this.getArticles(this.$route.params.pageNum)
  }
}
</script>

<style></style>
