<template>
    <div class="p-4">
        <div v-for="recipe in recipes" :key="recipe.id" class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl my-4">
            <div class="md:flex">
                <div class="p-8">
                    <a :href="`/recipes/${recipe.id}`" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ recipe.title }}</a>
                    <p class="mt-2 text-gray-500">{{ recipe.description }}</p>

                    <p class="mt-2">Serving size: <span class="font-bold">{{ recipe.serving_size }}</span></p>
                    <p class="mt-2">Cooking time: <span class="font-bold">{{ recipe.cooking_time }} minutes</span></p>
                    <div v-if="recipe.image" class="mt-2">
                        <img :src="recipe.image" alt="Recipe image" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from 'vue';
import axios from 'axios';

export default {
    name: 'RecipeListComponent',
    setup() {
        const recipes = ref([]);

        onMounted(async () => {
            const response = await axios.get('/api/recipes');
            recipes.value = response.data;
        });

        return {
            recipes,
        };
    },
};
</script>
