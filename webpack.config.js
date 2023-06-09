const path = require('path')

const HtmlWebpackPlugin = require('html-webpack-plugin')
const CopyWebpackPlugin = require('copy-webpack-plugin')
const  { CleanWebpackPlugin } = require('clean-webpack-plugin')


module.exports = {
    entry: './src/index.php',
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: 'bundle.js',
        assetModuleFilename: 'assets/[hash][ext][query]',
        publicPath: "/"
    },
    mode: 'production',
    resolve: {
        extensions: ['.php'],
    },
    plugins: [
        new HtmlWebpackPlugin({
            template: './public/index.html',
            filename: './index.php'
        }),
        new MiniCssExtractPlugin({
            filename: '[name].css'
        }),
        new CleanWebpackPlugin(),
        new CopyWebpackPlugin({
            patterns: [
                { from: './src', to: './public'}
            ]
        })
    ]
}