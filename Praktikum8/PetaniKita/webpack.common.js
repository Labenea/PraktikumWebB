const path = require("path");
const loader = require("sass-loader");

module.exports = {
  entry: "./assets/js/app.js",
  output: {
    path: path.resolve(__dirname, "./assets/dist"),
    filename: "app.bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          {
            loader: "style-loader",
          },
          {
            loader: "css-loader",
          },
          {
            loader: "sass-loader",
          },
        ],
      },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"],
      },
    ],
  },
};
