import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        // Laravel looks for public/build/manifest.json (not .vite/manifest.json)
        manifest: 'manifest.json',
        emptyOutDir: true,
    },
});
