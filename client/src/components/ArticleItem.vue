<template>
  <b-card bg-variant="light" class="text-center mb-3" style="min-width: 18rem;">
    <b-card-body>
      <b-card-title>{{ article.title }}</b-card-title>
      <b-card-sub-title class="mb-2">
        <b-badge variant="secondary">Insert category here</b-badge>
      </b-card-sub-title>
      <b-card-text>{{ article.text }}</b-card-text>
      <b-card-text>
        by
        <strong>Insert author here</strong>
      </b-card-text>
    </b-card-body>
    <b-button class="mx-1" variant="info" :to="`/post/edit/${article.id}`">Edit</b-button>
    <b-button class="mx-1" variant="danger" @click="deleteArticle(article.id)">Delete</b-button>
  </b-card>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'ArticleItem',
  props: ['article'],
  methods: { ...mapActions(['deleteArticle']) }
}
</script>

<style></style>
