<script setup lang="ts">
import { ref, onMounted} from 'vue';
import LikesAndCommentsCounter from '../components/LikesAndCommentsCounter.vue';
import CommentItem from '../components/CommentItem.vue';
import CommentEditor from '../components/CommentEditor.vue';

const showCommentEditor = ref(false);
const articles = ref([]);

</script>
<template>
<div class="max-w-6xl mx-auto bg-indigo-100 rounded-lg p-6 mb-4">
  <h2 class="text-2xl font-bold text-center mb-4">Selected Blog Title</h2>
  <div class="text-center text-gray-600 mb-4">Author Name | Date Published</div>
  <div class="text-justify">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor bibendum nisi, a venenatis felis rutrum vel. Maecenas lacinia sagittis velit, nec tristique elit aliquam nec. Nulla facilisi. Proin vitae felis eget elit ultricies varius. Sed feugiat purus sit amet purus vehicula, sed tincidunt tortor bibendum.</p>
      <p>Mauris consectetur ex vitae urna dictum, nec bibendum dolor pulvinar. Nulla ac aliquet libero. Curabitur non nisi justo. Aliquam erat volutpat. Sed lobortis sapien vitae magna suscipit, nec laoreet ante malesuada. Sed non commodo metus, et ultrices ligula. Integer vestibulum scelerisque quam ut posuere.</p>
  </div>
</div>

<LikesAndCommentsCounter />
<CommentItem />

<div class="flex justify-center" v-if="!showCommentEditor">
    <button
        @click="showCommentEditor = true"
        class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">
        Leave a comment
    </button>
</div>

<CommentEditor v-if="showCommentEditor"/>
</template>