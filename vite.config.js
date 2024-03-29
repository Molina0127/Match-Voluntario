import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/css/responsive.css',
                'resources/js/main.js',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],

    build: {
        manifest: true,
    },

    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
