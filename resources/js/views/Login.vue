<script setup lang="ts">
import { useRoute } from 'vue-router';
import { useUserStore } from '../stores/UserStore';
import { ref } from 'vue';
import { computed } from 'vue';
import { capitalize } from 'vue';

const route = useRoute();
const userStore = useUserStore();
const username = ref('');
const password = ref('');
const name = ref('');

const method = computed(() => {
  return route.name as string;
});

const action = () => {
  method.value === 'login' ? login() : register();
};

const register = () => {
  userStore.register(
    {
      name: name.value,
      username: username.value,
      password: password.value
    }
  );
};

const login = () => {
  userStore.login({
    username: username.value,
    password: password.value
  });
};

</script>
<template>
<div class="bg-stone-200 h-screen overflow-hidden flex items-center justify-center">
  <div class="bg-white lg:w-5/12 md:6/12 w-10/12 shadow-3xl">
    <div class="bg-purple-800 absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full p-4 md:p-8">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="#FFF">
        <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
      </svg>
    </div>
    <form class="p-12 md:p-24">
      <div
        v-if="method === 'register'"
        class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute ml-3" width="24" viewBox="0 0 24 24">
          <path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/>
        </svg>
        <input
          v-model="name"
          type="text" id="username" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Name" />
      </div>
      <div class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute ml-3" width="24" viewBox="0 0 24 24">
          <path fillRule="evenodd" d="M5.404 14.596A6.5 6.5 0 1 1 16.5 10a1.25 1.25 0 0 1-2.5 0 4 4 0 1 0-.571 2.06A2.75 2.75 0 0 0 18 10a8 8 0 1 0-2.343 5.657.75.75 0 0 0-1.06-1.06 6.5 6.5 0 0 1-9.193 0ZM10 7.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clipRule="evenodd" />
        </svg>
        <input
          v-model="username"
          type="text" id="username" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Username" />
      </div>
      <div class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute ml-3" viewBox="0 0 24 24" width="24">
          <path d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z"/>
        </svg>
        <input
          v-model="password"
          type="password" id="password" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Password" />
      </div>
      <button
        @click.prevent="action()"
        class="bg-purple-800 hover:bg-purple-700 font-medium p-2 md:p-4 text-white uppercase w-full">{{ method }}</button>
    </form>
  </div>
 </div>
</template>