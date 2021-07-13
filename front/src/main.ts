import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './assets/tailwind.css';
import axios from 'axios';

axios.defaults.baseURL = 'http://192.168.179.1:8080/api/v1/';
axios.defaults.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axios.defaults.withCredentials = true;

createApp(App).use(store).use(router).mount('#app')
