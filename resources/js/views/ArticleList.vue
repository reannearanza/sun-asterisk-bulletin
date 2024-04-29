<script setup lang="ts">
import { ref, onMounted } from 'vue';
import ArticleItem from '../components/ArticleItem.vue';
import ConfirmationModal from '../components/ConfirmationModal.vue';
import { articleStore } from '../stores/ArticleStore.ts';

const showDeleteModal = ref(false);
const articles = ref(articleStore.articles);

onMounted(() => {
})
</script>
<template>
  <ArticleItem
    v-for="article in articles"
    :key="article.key"
    :article="article"
    @delete-article="showDeleteModal = true"
  />
  <ConfirmationModal
    v-model="showDeleteModal"
  />
</template>