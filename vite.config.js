import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/panel/home/home.css",
                "resources/css/panel/lab/home.css",
                "resources/css/app.css",
                "resources/sass/panel/swiper.scss",
                "resources/sass/app.scss",
                "resources/sass/panel/about/about.sass",
                "resources/js/app.js",
                "resources/js/swiper.js",
                "resources/js/jquery.js",
            ],
            refresh: true,
        }),
    ],
});
