import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/main.scss",
                "resources/js/app.js",
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/burger.js",
                "resources/js/game.js",
                "resources/js/lore.js",
            ],

            refresh: true,
        }),
    ],
});
