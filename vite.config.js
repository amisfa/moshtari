import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import postcssConfig from "./postcss.config.js";
import Vuetify, {transformAssetUrls} from 'vite-plugin-vuetify'

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: ['public/css/app.css', 'public/vue/main.js'],
            refresh: true,
        }),
        vue({
            template: {transformAssetUrls}
        }),
        Vuetify({
            autoImport: true,
        }),
    ],
    define: {
        'process.env': process.env
    },
    css: {
        postcss: postcssConfig,
    },

});
