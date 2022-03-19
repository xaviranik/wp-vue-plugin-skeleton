const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const defaultModule = defaultConfig.module;
const defaultPlugins = defaultConfig.plugins;
const defaultRules = defaultModule.rules;

const { VueLoaderPlugin } = require("vue-loader");

module.exports = {
	...defaultConfig,
	module: {
		...defaultModule,
		rules: [
			...defaultRules,
			{ test: /\.vue$/, use: 'vue-loader' }
		],
	},
	plugins: [
		...defaultPlugins,
		new VueLoaderPlugin(),
	],
};
