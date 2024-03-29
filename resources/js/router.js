import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Home.vue';
import RecipeListComponent from './components/RecipeListComponent.vue';
import RecipeDetailComponent from './components/RecipeDetailComponent.vue';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import store from './store.js'; // Import the Vuex store instance
import { createApp } from 'vue';

const routes = [
    { path: '/', name: 'Home', component: Home },
    // { path: '/recipes', name: 'RecipeList', component: RecipeListComponent, meta:{ requiresAuth: true }  },
    { path: '/recipes', name: 'RecipeList', component: RecipeListComponent },
    { path: '/recipes/:id', name: 'RecipeDetail', component: RecipeDetailComponent, props: true },
    { path: '/login', name: 'Login', component: LoginComponent },
    { path: '/register', name: 'Register', component: RegisterComponent },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp({});

app.use(router);

app.mount('#app');

router.beforeEach((to, from, next) => {
    const isAuthenticated = store.getters.isAuthenticated; // Access the store directly

    if (to.meta.requiresAuth && !isAuthenticated) {
        next({ path: '/login' });
    } else {
        next();
    }
});

export default router;
