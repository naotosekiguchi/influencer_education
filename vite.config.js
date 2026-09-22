import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/admin_top.css',
                'resources/css/admin_common.css',
                'resources/css/admin_banner.css',
            ],
            refresh: true,
        }),
    ],
});
