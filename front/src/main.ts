import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css';
import axios from 'axios';
import store from './store'

axios.defaults.baseURL = 'http://192.168.179.1:8080/api/v1/influencer';
// axios.defaults.withCredentials = true;
axios.defaults.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

createApp(App).use(store).use(router).mount('#app')
