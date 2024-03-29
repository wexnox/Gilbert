<template>
    <div class="recipe-detail">
        <h2>{{ recipe.title }}</h2>
        <p>{{ recipe.description }}</p>
        <!-- Details like ingredients and steps go here -->
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

        onMounted(async () => {
            const response = await axios.get(`/api/recipes/${props.id}`);
            recipe.value = response.data;
        });

        return {
            recipe,
        };
    },
};
</script>
