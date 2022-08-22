/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        main: colors.cyan,
        gray: colors.slate,
        error: colors.red,
      }
    },

    
  },
  plugins: [],
}
