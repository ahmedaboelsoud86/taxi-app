import './bootstrap';

import { createApp } from "vue";
import App from './src/App.vue'

import ToastPlugin from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-bootstrap.css';

import { router } from  './src/router'
import { createPinia } from  'pinia'

const  pinia = createPinia()

createApp(App).use(router).use(pinia).use(ToastPlugin).mount('#app')


