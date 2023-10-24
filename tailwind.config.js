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
                'primary': colors.emerald[600],
                'primary-dark': colors.emerald[700],
                'primary-contrast': colors.white,
            },
            boxShadow: {
                'default': '0 2px 6px rgba(0,0,0,0.35)'
            },
            minWidth: scale.width
        },
    },
    plugins: [
        require('@tailwindcss/container-queries'),
        require('tailwindcss-debug-screens'),
    ],
}

