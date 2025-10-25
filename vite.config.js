import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',  // Force IPv4
        port: 5173,
        cors: {
            origin: ['http://joyboy.com', 'http://localhost:8000'],
            credentials: true,
        },
        hmr: {
            host: '127.0.0.1',  // IPv4 for @vite/client
            port: 5173,
        },
    },
    esbuild: {
        target: 'es2020',
    },
});
