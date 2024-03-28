import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['src/css/app.css', 'src/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
});
