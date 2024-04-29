// resources/js/axios.js
import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8003/api';
// axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

export default axios;
