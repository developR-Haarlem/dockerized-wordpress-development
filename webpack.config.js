/* eslint-disable no-undef */
const webpack = require('webpack');
const path = require('path');
const merge = require('webpack-merge');

const modeConfig =
  process.env.NODE_ENV === 'production'
    ? require('./webpack.prod')
    : require('./webpack.dev');

module.exports = merge(
  {
    mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
    entry: {
      site: './starter-theme/src/js/site.js',
      admin: './starter-theme/src/js/admin.js'
    },
    output: {
      filename: '[name].js',
      path: path.resolve(__dirname, 'dist/starter-theme/assets/')
    },
    module: {
      rules: [
        {
          test: /\.js$/, // scripts
          exclude: /node_modules/,
          use: ['babel-loader']
        },
        {
          test: /\.(png|svg|jpg|jpeg|gif)$/, // images
          use: ['file-loader']
        },
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/, // fonts
          use: ['file-loader']
        },
      ]
    },
    plugins: []
  },
  modeConfig
);
