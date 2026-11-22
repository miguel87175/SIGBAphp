import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [ 
                'resources/css/dashboard.css', 
                'resources/js/dashboard.js',
                'resources/css/LandingPage/login.css',
                'resources/js/LandingPage/login.js',
                'resources/css/pagina.css',
                'resources/js/pagina.js',
                'resources/css/LandingPage/registro.css',
                'resources/js/LandingPage/registro.js',
                'resources/css/LandingPage/olvido.css',
                'resources/js/LandingPage/olvido.js',
                'resources/css/LandingPage/login.css',
                'resources/js/LandingPage/login.js',
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
