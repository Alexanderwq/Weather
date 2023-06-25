const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  publicPath: process.env.NODE_ENV === 'dev' ? '/' : './vue/dist/',
  devServer: {
    proxy: {
      '/': {
        target: 'http://localhost',
        ws: false,
      }
    }
  },
})
