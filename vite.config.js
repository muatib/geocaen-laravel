import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/burger.js',
                'resources/js/game.js',
                'resources/js/slide.js',
                'resources/js/account.js'
            ],
            refresh: true,
        }),
    ],
});
