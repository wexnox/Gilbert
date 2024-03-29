// vue.config.js
module.exports = {
    devServer: {
        proxy: {
            '/api': {
                target: 'http://localhost:8000', // Change to your Laravel app's URL
                changeOrigin: true,
                pathRewrite: { '^/api': '' },
            },
        },
    },
};
