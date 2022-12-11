
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default ({ mode }) => {

    return defineConfig({
        server: {
            host: true,
            port: 5173
        },
        resolve: {
            alias: {
                '@': '/resources/js',
            },
        },
        plugins: [
            laravel({
                input: [
                    'resources/js/app.js',
                ],
                refresh: true,
            }),
        ],
    })
}
