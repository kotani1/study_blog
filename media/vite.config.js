import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/index.scss', 'resources/js/article.js', 'resources/js/common.js'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost'
        }
    }
});
