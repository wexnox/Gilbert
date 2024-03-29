<template>
    <div>
        <section class="hero bg-cover bg-center h-screen" :style="{ backgroundImage: `url(${heroImage})` }">
            <div class="text-center text-white py-36">
                <h1 class="text-5xl font-bold mb-4">Discover Your Next Favorite Recipe</h1>
                <p class="text-xl mb-8">Join our community of food lovers.</p>
                <router-link to="/register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Get Started</router-link>
            </div>
        </section>
        <section class="features py-12">
            <div class="container mx-auto grid grid-cols-3 gap-8 text-center">
                <div class="feature">
                    <img :src="discoverIcon" alt="Discover" class="mx-auto mb-4">
                    <h3 class="font-bold mb-2">Discover Recipes</h3>
                    <p>Explore thousands of recipes from around the world.</p>
                </div>
                <div class="feature">
                    <img :src="createIcon" alt="Create" class="mx-auto mb-4">
                    <h3 class="font-bold mb-2">Create Your Own</h3>
                    <p>Share your culinary creations with a global audience.</p>
                </div>
                <div class="feature">
                    <img :src="communityIcon" alt="Community" class="mx-auto mb-4">
                    <h3 class="font-bold mb-2">Join the Community</h3>
                    <p>Connect with fellow food enthusiasts.</p>
                </div>
            </div>
        </section>

        <section class="hero bg-gray-100 py-20">
            <div class="container mx-auto text-center">
                <h1 class="text-5xl font-bold">Discover and Share Recipes</h1>
                <p class="text-xl mt-4">Join a community of food lovers sharing their favorite recipes.</p>
            </div>
        </section>

        <section class="features py-20">
            <div class="container mx-auto grid grid-cols-3 gap-4">
                <!-- Feature blocks go here -->
            </div>
        </section>

        <section class="popular-recipes py-20">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center">Popular Recipes</h2>
                <!-- Recipe cards go here -->
            </div>
        </section>

        <section class="cta bg-blue-500 text-white py-20">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold">Start Sharing Your Recipes Today</h2>
                <router-link to="/register" class="mt-4 inline-block bg-white text-blue-500 py-2 px-4">Sign Up</router-link>
            </div>
        </section>
        <section class="cta bg-blue-500 text-white py-12 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Share Your Recipes?</h2>
            <p class="mb-8">Sign up now and join our community of home chefs.</p>
            <router-link to="/register" class="bg-white hover:bg-gray-100 text-blue-500 font-bold py-2 px-4 rounded">Join Now</router-link>
        </section>

    </div>
</template>

<script>
import heroImage from '@assets/images/hero-image.webp';
import discoverIcon from '@assets/images/discover-icon.webp';
import createIcon from '@assets/images/create-icon.webp';
import communityIcon from '@assets/images/community-icon.webp';
export default {
    name: 'Home',
    data() {
        return {
            heroImage,
            discoverIcon,
            createIcon,
            communityIcon,
        };
    },
};
</script>
