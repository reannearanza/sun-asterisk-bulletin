<template>
  <div class="max-w-6xl mx-auto min-h-screen flex flex-col">
    <!-- Fixed button for saving the article -->
    <div class="flex justify-end" v-if="!showCommentEditor">
      <button
          @click="showCommentEditor = true"
          class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">
          Post
      </button>
    </div>
    
    <!-- Title input -->
    <input type="text" class="border-b text-2xl font-bold focus:outline-none py-2 px-4" placeholder="Your Article Title" />

    <!-- Blog content -->
    <div class="flex-grow p-4">
        <textarea class="w-full h-full bg-white border-none p-4 focus:outline-none resize-none" placeholder="Write your article here..."></textarea>
    </div>
</div>

</template>
<!-- <template>
<div>
  <label for="OrderNotes" class="sr-only">Order notes</label>

  <div
    class="overflow-hidden rounded-lg border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600"
  >
    <textarea
      id="OrderNotes"
      class="w-full resize-none border-none align-top focus:ring-0 sm:text-sm"
      rows="4"
      placeholder="Enter any additional order notes..."
    ></textarea>

    <div class="flex items-center justify-end gap-2 bg-white p-3">
      <button
        type="button"
        class="rounded bg-gray-200 px-3 py-1.5 text-sm font-medium text-gray-700 hover:text-gray-600"
      >
        Clear
      </button>

      <button
        type="button"
        class="rounded bg-indigo-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-indigo-700"
      >
        Add
      </button>
    </div>
  </div>
</div>
</template> -->