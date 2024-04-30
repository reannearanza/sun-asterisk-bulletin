import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

interface User {
  id: number;
  name: string;
  username: string;
  token: string;
}

const setup = () => {
  const user = ref({} as User);
  const isAuthenticated = ref(false);
  const router = useRouter();

  const login = (payload: any) => {
    axios.get('/sanctum/csrf-cookie').then(response => {
      axios.post('/login', payload).then(response => {
        user.value = response.data;
        localStorage.setItem('token', user.value.token);
        router.push({ name: 'articles' });
          axios.interceptors.request.use((config) => {
            config.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            return config;
          })
      });
    });
  }

  const register = (payload: any) => {
    axios.get('/sanctum/csrf-cookie').then(response => {
      axios.post('/register', payload).then(response => {
        user.value = response.data;
        localStorage.setItem('token', user.value.token);
        router.push({ name: 'articles' });
          axios.interceptors.request.use((config) => {
            config.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            return config;
          })
      });
    });
  }

  const logout = () => {
    axios.post('/logout').then(response => {
      user.value = {} as User;
      localStorage.removeItem('token');
      router.push({ name: 'login' });
    });
  }

  return {
    user,
    isAuthenticated,
    login,
    logout,
    register
  }
}

export const useUserStore = defineStore('userStore', setup)