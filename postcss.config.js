module.exports = {
  plugins: [
    // require('autoprefixer')({
    //   grid: true
    // }),
    require('postcss-import')({
      plugins: [
        require('stylelint'),
      ]
    }),
    require('postcss-font-magician')({
      variants: {
        'Poppins, Source Sans Pro': {
          '300': [],
          '400': [],
        }
      }
    }),
    require('postcss-cssnext')({

        autoprefixer: {
          grid: true,
          flexbox: false,
        },
        customProperties: false,
        calc: false,
    }),
    require('css-mqpacker'),
    // require('cssnano'),
  ]
}

