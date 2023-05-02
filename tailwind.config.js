const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    50: '#e6e6f2',
                    100: '#cccce5',
                    200: '#b3b3d7',
                    300: '#9999ca',
                    400: '#8080bd',
                    500: '#6666b0',
                    600: '#4d4da3',
                    700: '#333395',
                    800: '#1a1a88',
                    900: '#00007b',
                    950: '#00006f',
                },
                'secondary': {
                    50: '#fff1e6',
                    100: '#ffe3cc',
                    200: '#ffd5b3',
                    300: '#ffc799',
                    400: '#ffb980',
                    500: '#ffab66',
                    600: '#ff9d4d',
                    700: '#ff8f33',
                    800: '#ff811a',
                    900: '#ff7300',
                    950: '#e66800',
                },
                danger: colors.rose,
                default: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
