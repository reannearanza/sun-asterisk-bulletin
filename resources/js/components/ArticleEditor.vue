<script setup lang="ts">
import { ref } from 'vue';
import { useArticleStore } from '../stores/ArticleStore';

const articleStore = useArticleStore();
const title = ref('');
const content = ref('');

const postArticle = () => {
  articleStore.createArticle({
    title: title.value,
    content: content.value
  });
}
</script>
<template>
  <div class="max-w-6xl mx-auto min-h-screen flex flex-col">
    <div class="flex justify-end">
      <button
          @click="postArticle()"
          class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">
          Post
      </button>
    </div>
    
    <input v-model="title" type="text" class="border-b text-2xl font-bold focus:outline-none py-2 px-4" placeholder="Your Article Title" />

    <div class="flex-grow p-4">
        <textarea v-model="content" class="w-full h-full bg-white border-none p-4 focus:outline-none resize-non" placeholder="Write your article here..."></textarea>
    </div>
</div>

</template>