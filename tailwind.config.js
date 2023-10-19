let colors = require('tailwindcss/colors')
let scale = require('tailwindcss/defaultTheme')

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
            },
            boxShadow: {
                'default': '0 2px 6px rgba(0,0,0,0.35)'
            },
            minWidth: scale.width
        },
    },
    plugins: [
        require('@tailwindcss/container-queries'),
    ],
}

