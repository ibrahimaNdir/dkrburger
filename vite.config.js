import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/acceuil/style.css',
                'resources/css/acceuil/style.scss',
                'resources/css/acceuil/responsive.css',
                'resources/js/index/custom.js',
                'resources/js/index/bootstrap.js',
                'resources/css/acceuil/bootstrap.css',
                'resources/css/chart.css',
                'resources/css/adminproduits/style.css',
                'resources/js/admin/index.js'
            ],
            refresh: true,
        }),
    ],
});
