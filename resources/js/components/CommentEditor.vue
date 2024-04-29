<template>
  <div class="max-w-6xl mx-auto bg-indigo-100 rounded-lg p-4 mb-4">
    <div class="flex justify-between mb-2">
        <div>
            <span class="font-bold">Your Name</span>
            <span class="text-gray-600"> (@yourusername)</span>
        </div>
    </div>
    <textarea class="w-full h-20 bg-white border border-gray-300 rounded p-2 mb-2 focus:outline-none focus:border-blue-500 resize-none" placeholder="Write your comment here..."></textarea>
    <div class="flex justify-end">
        <button class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">Send</button>
    </div>
  </div>
</template>