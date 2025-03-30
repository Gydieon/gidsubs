import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/sass/app.scss',  // ✅ Ensure this is included
            'resources/js/app.js',
        ]),
    ],
});
