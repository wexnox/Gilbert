<template>
    <section class="popular-recipes py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Popular Recipes</h2>
            <Splide :options="{ perPage: 3, rewind : true, gap: '1rem' }">
                <SplideSlide v-for="recipe in recipes" :key="recipe.id">
                    <img :src="recipe.image" alt="Recipe image" class="rounded">
                    <h4 class="text-xl font-bold mt-2">{{ recipe.title }}</h4>
                </SplideSlide>
            </Splide>
        </div>
    </section>
</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import '@splidejs/splide/dist/css/splide.min.css';

export default {
    components: { Splide, SplideSlide },
    data() {
        return {
            // Sample data, replace with actual data from your backend
            recipes: [
                { id: 1, title: 'Recipe 1', image: '/path/to/image1.jpg' },
                { id: 2, title: 'Recipe 2', image: '/path/to
