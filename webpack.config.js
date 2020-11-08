// const webpack require("webpack");
const path = require("path");

module.exports = {
    entry:"./assets/js/app.js",
        output:{
            filename: "main.js",
            path: __dirname + "./dist",
        },
    // watch:true,
    module: {
        rules:[
            {
                test: /\.js/, 
                exclude:/(node_modules|bower_components)/,
                use: ['babel-loader'],
            },
            {
                test: /\.css$/,
                use: [
                  'style-loader',
                  'css-loader'
                ],
            },
            {
                test: /\.(png|svg|jpg|gif)$/,
                use: [
                  'file-loader',
                ],
            },
        ]
    },
};
    mode:'development'
