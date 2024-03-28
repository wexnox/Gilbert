// vue.config.js
module.exports = {
    devServer: {
        proxy: {
            '/api': {
                target: 'http://gilbert.test', // Change to your Laravel app's URL
                changeOrigin: true,
                pathRewrite: { '^/api': '' },
            },
        },
    },
};
