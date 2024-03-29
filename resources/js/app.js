import './bootstrap.js';
import './router.js'

import { createApp } from 'vue';
import App from './App.vue'; // Your main App component
import router from './router'; // Import router
import store from './store'; // Import Vuex store

const app = createApp(App);

app.use(store); // Use Vuex store
app.use(router); // Use Vue Router

app.mount('#app');
