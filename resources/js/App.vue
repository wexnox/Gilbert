<template>
    <div class="min-h-screen flex flex-col">
        <Navbar />
        <router-view class="flex-grow" />
        <Footer />
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';

export default {
    components: {
        Navbar,
        Footer,
    },
};
</script>
