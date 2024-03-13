import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/breeze.css',
                'resources/js/app.js',
                'resources/js/breeze.js',
                'resources/css/rating.css'
            ],
            refresh: true,
        }),
    ],
});
