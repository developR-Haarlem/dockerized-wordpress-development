const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');


module.exports = {
	// context: path.resolve(__dirname, 'dist'),
	output: {
		publicPath: '/wp-content/themes/starter-theme/assets/'
	},
	module: {
		rules: [
		{
			test: /\.(c|sa|sc)ss$/,
			use: [
				MiniCssExtractPlugin.loader,
					'css-loader',
					'postcss-loader',
					'sass-loader'
				]
		}
		]
	},
	plugins: [
		new CopyWebpackPlugin([
			{
				from: './starter-theme/*',
				to: path.resolve(__dirname, 'dist/')
			},
			{
				from: './starter-theme/inc/**/*',
				to: path.resolve(__dirname, 'dist/')
			},
			{
				from: './starter-theme/template-parts/**/*',
				to: path.resolve(__dirname, 'dist/')
			},
			{
				from: './starter-theme/assets/**/*',
				to: path.resolve(__dirname, 'dist/')
			}
		]),
		new MiniCssExtractPlugin({ 
			filename: '[name].css' 
		})
	]
};
