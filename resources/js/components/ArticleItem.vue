<script setup lang="ts">
import { defineEmits, toRefs } from 'vue';
import { useRouter } from 'vue-router';
import { Article } from '../types/Articles';

interface ArticleItemInterface {
  article: Article
}
const props = defineProps<ArticleItemInterface>();

const { article } = toRefs(props);
const emits = defineEmits(['deleteArticle']);
const router = useRouter();
const openArticle = () => {
  router.push({ name: 'show-article', params: { id: article.value.key } });
}

const deleteArticle = () => {
  emits('deleteArticle', article.value.key);
}
</script>
<template>
  <div class="max-w-3xl mx-auto bg-indigo-100 rounded-lg p-6 mb-4 flex items-center justify-between">
    <div>
        <h2 class="text-xl font-semibold mb-2">
            <a
              @click.stop="openArticle()"
              class="text-blue-500 hover:underline">{{ article.title }}</a>
        </h2>
        <p class="text-gray-700">{{ article.content }}</p>
    </div>
    <button
      @click.stop="deleteArticle()"
      class="flex items-center justify-center bg-red-500 text-white rounded-full w-10 h-10 hover:bg-red-600 focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
      </svg>


    </button>
  </div>
</template>