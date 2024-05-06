import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-color-1': '#ff0000', // Red
                'custom-color-2': '#ffa500', // Orange
                'custom-color-3': '#008000', // Green
                'custom-color-4': '#0000ff', // Blue
                'custom-color-5': '#ff69b4', // Pink
            },
        },
    },

    plugins: [forms],
};
