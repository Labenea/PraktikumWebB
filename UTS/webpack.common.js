const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");

module.exports = {
  entry: "./public/src/app.js",
  output: {
    path: path.resolve(__dirname, "public/dist"),
    filename: "[name].bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: ["style-loader", "css-loader", "sass-loader"],
      },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"],
      },
    ],
  },
  optimization: {
    splitChunks: {
      chunks: "all",
    },
  },
};
