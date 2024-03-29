<template>
    <div class="max-w-xl mx-auto p-4">
        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" v-model="recipe.title">
            </div>
            <!-- Add more fields for description, ingredients, etc. -->
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Save Recipe
            </button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';

export default {
    name: 'RecipeFormComponent',
    props: {
        recipeId: {
            type: String,
            default: ''
        },
    },
    setup(props) {
        const recipe = ref({
            title: '',
            // Initialize other properties
        });

        // Fetch recipe if editing
        if (props.recipeId) {
            axios.get(`/api/recipes/${props.recipeId}`).then(response => {
                recipe.value = response.data;
            });
        }

        const submitForm = () => {
            const method = props.recipeId ? 'put' : 'post';
            const url = props.recipeId ? `/api/recipes/${props.recipeId}` : '/api/recipes';

            axios[method](url, recipe.value).then(() => {
                // Handle success (e.g., show message, redirect)
            }).catch(error => {
                // Handle error
            });
        };

        return {
            recipe,
            submitForm,
        };
    },
};
</script>
