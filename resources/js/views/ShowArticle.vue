<script setup lang="ts">
import { ref, onMounted, computed} from 'vue';
import LikesAndCommentsCounter from '../components/LikesAndCommentsCounter.vue';
import CommentEditor from '../components/CommentEditor.vue';
import { useArticleStore } from '../stores/ArticleStore';
import { useRouter } from 'vue-router';
import { storeToRefs } from 'pinia';
import CommentList from '../components/CommentList.vue';

const articleStore = useArticleStore();
const { article } = storeToRefs(articleStore);
const showCommentEditor = ref(false);
const router = useRouter();

const publishDate = computed(() => {
    return new Date(article.value.createdAt).toLocaleDateString();
})

onMounted(() => {
    articleStore.getArticle(router.currentRoute.value.params.id);
})

</script>
<template>
<div class="max-w-6xl mx-auto bg-indigo-100 rounded-lg p-6 mb-4">
  <h2 class="text-2xl font-bold text-center mb-4">{{ article.title }}</h2>
  <div class="text-center text-gray-600 mb-4">{{ article.author?.name }} | {{ publishDate }}</div>
  <div class="text-justify">
    {{ article.content }}
  </div>
</div>

<LikesAndCommentsCounter :article="article"/>
<CommentList />

<div class="flex justify-center" v-if="!showCommentEditor">
    <button
        @click="showCommentEditor = true"
        class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">
        Leave a comment
    </button>
</div>

<CommentEditor v-if="showCommentEditor"/>
</template>