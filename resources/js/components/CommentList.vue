<script setup lang="ts">
import { onMounted } from 'vue';
import CommentItem from '../components/CommentItem.vue';
import { useCommentStore } from '../stores/CommentStore';
import { storeToRefs } from 'pinia';
import { useRouter } from 'vue-router';

const router = useRouter();
const commentStore = useCommentStore();
const { commentList } = storeToRefs(commentStore);

onMounted(() => {
  commentStore.getCommentList(
    router.currentRoute.value.params.id as string
  );
})
</script>
<template>
  <CommentItem
    v-for="comment in commentList"
    :key="comment.key"
    :comment="comment"
  ></CommentItem>
</template>