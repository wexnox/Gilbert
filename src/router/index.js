import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import RecipeListComponent from '../components/RecipeListComponent.vue';
import RecipeDetailComponent from '../components/RecipeDetailComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import RegisterComponent from '../components/RegisterComponent.vue';
import { useAuthStore } from '../store/index.js';
import { createApp } from 'vue';

const routes = [
    { path: '/', name: 'Home', component: Home },
    { path: '/list', name: 'RecipeList', component: RecipeListComponent, meta:{ requiresAuth: true }  },
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
    const authStore = useAuthStore();
    const isAuthenticated = authStore.isAuthenticated; // Ensure this is reactive

    if (to.meta.requiresAuth && !isAuthenticated) {
        next({ path: '/login' });
    } else {
        next();
    }
});

export default router;
