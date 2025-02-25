import './bootstrap';

import { createApp } from "vue";
import App from './src/App.vue'

import { router } from  './src/router'
import { createPinia } from  'pinia'

const  pinia = createPinia()

createApp(App).use(router).use(pinia).mount('#app')


