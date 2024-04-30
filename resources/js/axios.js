// resources/js/axios.js
import axios from 'axios';
import { storeToRefs } from 'pinia';
import { useUserStore } from './stores/UserStore';
const store = useUserStore();
const { user } = storeToRefs(store);

axios.defaults.baseURL = 'http://localhost:8003/api';
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.headers.common['Accept'] = 'application/json';

export default axios;
