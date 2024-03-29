<template>
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-bold">RecipeApp</a>
            <div class="flex items-center">
                <router-link to="/" class="mx-2 hover:underline">Home</router-link>
                <router-link to="/recipes" class="mx-2 hover:underline">Recipes</router-link>
                <!-- Conditional rendering based on authentication status -->
                <router-link to="/login" class="mx-2 hover:underline">Login</router-link>
                <router-link to="/register" class="mx-2 hover:underline">Sign Up</router-link>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Navbar',
};
</script>

