<script setup lang="ts">
 import { defineProps, toRefs } from 'vue';
 
interface ConfirmationModalProps {
  modelValue?: string
}

 const props = defineProps<ConfirmationModalProps>();
 const { modelValue } = toRefs(props);
 const emit = defineEmits(['update:modelValue'])
</script>
<template>
<div
  v-if="modelValue"
  class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg p-6">
        <p class="mb-4">Are you sure you want to delete this blog?</p>
        <div class="flex justify-end">
            <button
              @click="emit('update:modelValue', modelValue)"
              class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 mr-2 rounded">Confirm</button>
            <button
              @click="emit('update:modelValue', false)"
              class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Cancel</button>
        </div>
    </div>
</div>

</template>