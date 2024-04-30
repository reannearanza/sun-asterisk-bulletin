import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from 'vue-router';
import { Routes } from './routes';
import { createPinia } from 'pinia'

const app = createApp({});
const router = createRouter({
  routes: Routes,
  history: createWebHistory(),
});

app.use(router);
app.use(createPinia());
app.mount('#app');
