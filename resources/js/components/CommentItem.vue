<script setup lang="ts">
import { defineProps, toRefs } from 'vue';
import { Comment } from '../types/Comments';

interface CommentItemInterface {
    comment: Comment
}
const props = defineProps<CommentItemInterface>();

const { comment } = toRefs(props);
</script>
<template>
  <div class="max-w-6xl mx-auto bg-indigo-100 rounded-lg p-4 mb-4">
    <div class="flex justify-between mb-2">
        <div>
            <span class="font-bold">{{ comment.author?.name }}</span>
            <span class="text-gray-600"> ({{ comment.author?.username }})</span>
        </div>
    </div>
    <p class="text-gray-800">{{ comment.comment }}</p>
</div>
</template>