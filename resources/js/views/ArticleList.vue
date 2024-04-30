<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { storeToRefs } from 'pinia';
import ArticleItem from '../components/ArticleItem.vue';
import ConfirmationModal from '../components/ConfirmationModal.vue';
import { useArticleStore } from '../stores/ArticleStore';

const articleStore = useArticleStore();
const { articleList } = storeToRefs(articleStore);
const articleKey = ref('');

const handleUpdateModelValue = () => {
  if (articleKey.value) {
    articleStore.deleteArticle(articleKey.value).then(() => {
      articleKey.value = '';
      articleStore.getArticleList();
    });
  }
}

onMounted(() => {
  articleStore.getArticleList();
})
</script>
<template>
  <ArticleItem
    v-for="article in articleList"
    :key="article.key"
    :article="article"
    @delete-article="articleKey = $event"
  />
  <ConfirmationModal
    v-model="articleKey"
    @update:modelValue="handleUpdateModelValue()"
  />
</template>