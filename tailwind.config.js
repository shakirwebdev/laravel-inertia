const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        {
          pattern: /text-+/,
          variants: ['lg', 'hover', 'focus', 'lg:hover'],
        },
        {
            pattern: /italic/,
            variants: ['hover', 'focus']
        }
    ],

    plugins: [require('@tailwindcss/forms')],
};
