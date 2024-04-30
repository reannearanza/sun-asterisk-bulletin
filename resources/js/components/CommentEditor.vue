<script setup lang="ts">
import { computed, ref } from 'vue';
import { useCommentStore } from '../stores/CommentStore';
import { useRouter } from 'vue-router';
import { useUserStore } from '../stores/UserStore';
import { storeToRefs } from 'pinia';

const router = useRouter();
const userStore = useUserStore();
const { user } = storeToRefs(userStore);
const articleKey = computed(() => {
  return router.currentRoute.value.params.id as string
})
const commentStore = useCommentStore();
const comment = ref('');

const postComment = () => {
  commentStore.createComment(
      articleKey.value,
      {
        articleKey: articleKey.value,
        comment: comment.value
      }
    ).then(() => {
      commentStore.getCommentList(articleKey.value);
      comment.value = '';
    });
}
</script>
<template>
  <div class="max-w-6xl mx-auto bg-indigo-100 rounded-lg p-4 mb-4">
    <div class="flex justify-between mb-2">
        <div>
            <span class="font-bold">{{ user?.name }}</span>
            <span class="text-gray-600"> (@{{ user?.username }}) </span>
        </div>
    </div>
    <textarea
      v-model="comment"
      class="w-full h-20 bg-white border border-gray-300 rounded p-2 mb-2 focus:outline-none focus:border-blue-500 resize-none" placeholder="Write your comment here..."></textarea>
    <div class="flex justify-end">
        <button
          @click="postComment()"
          class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring"
        >
          Send
        </button>
    </div>
  </div>
</template>