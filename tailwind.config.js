let colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            'primary': colors.orange[600],
            'primary-dark': colors.orange[700],
            'muted': colors.gray[500],
            'muted-more': colors.gray[400],
            'heading': colors.gray[900]
        },
    },
  },
  plugins: [
      require('@tailwindcss/container-queries'),
  ],
}

