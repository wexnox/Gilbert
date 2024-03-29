<template>
    <div class="flex flex-col justify-center items-center h-screen text-gray-500">
        <div v-if="loading" class="text-center py-4">
            <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"></div>
            <p>Loading...</p>
        </div>
        <div v-else-if="error" class="text-red-500 text-xl font-bold">Error loading recipe</div>
        <div v-else class="w-full max-w-2xl p-6 m-auto bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-700">{{ recipe.title }}</h2>
            <p class="mt-2 text-gray-600">{{ recipe.description }}</p>
            <!-- Details like ingredients and steps go here -->
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from 'vue';
import axios from 'axios';

export default {
    name: 'RecipeDetailComponent',
    props: {
        id: {
            type: String,
            required: true,
        },
    },
    setup(props) {
        const recipe = ref(null);
        const loading = ref(true);
        const error = ref(null);

        onMounted(async () => {
            try {
                const response = await axios.get(`/api/recipes/${props.id}`);
                recipe.value = response.data;
                loading.value = false;
            } catch (err) {
                loading.value = false;
                error.value = err;
            }
        });

        return {
            recipe,
            loading,
            error,
        };
    },
};
</script>
