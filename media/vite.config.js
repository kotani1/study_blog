import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/index.scss', 'resources/sass/common.scss',
                'resources/sass/article.scss',
                'resources/js/article.js', 'resources/js/common.js',
                'resources/js/index.js',],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost'
        }
    }
});
