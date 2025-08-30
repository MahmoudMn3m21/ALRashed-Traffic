import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [],
        },
        devSourcemap: true,
    },
    build: {
        outDir: 'public/build',
        manifest: true,
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['bootstrap', '@popperjs/core'],
                    app: ['./resources/js/app.js']
                },
            },
        },
        sourcemap: false,
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
    },
    server: {
        hmr: {
            host: 'localhost',
        },
        host: 'localhost',
        port: 5173,
    },
    resolve: {
        alias: {
            '~bootstrap': 'bootstrap',
        },
    },
    optimizeDeps: {
        include: [
            'bootstrap',
            '@popperjs/core'
        ],
    },
});