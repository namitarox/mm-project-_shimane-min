const path = require('path');

module.exports = {
  // モード値を production に設定すると最適化された状態で、
  // development に設定するとソースマップ有効でJSファイルが出力される
  mode: "development",

  // メインのJS
  entry: "./src/js/index.js",
  // 出力ファイル
  output: {
    filename: "bundle.js"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules\/(?![swiper|dom7])/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: [['@babel/preset-env', { modules: false }]],
            },
          },
        ],
      },
    ],
  },
}