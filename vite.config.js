import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import solidPlugin from 'vite-plugin-solid';
import tsconfigPaths from 'vite-tsconfig-paths';

export default defineConfig({
    plugins: [
        solidPlugin(),
        tsconfigPaths(),
        laravel({
            input: [
                'resources/css/app.css', 
                //'resources/js/app.js',
                'resources/solid/src/index.tsx',
            ],
            refresh: true,
        }),
    ],
    //resolve: {
    //    '@': '/resource/ts'
    //},
    server: {
        hmr: {
            host: 'localhost'
        }
    },
    //root: 'resources/solid',
    //base: '/',
    //publicDir: 'public',
    //build: {
    //    outDir: '../../public',
    //    emptyOutDir: true
    //},
    envDir: '../../../'
});
