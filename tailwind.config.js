import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js', // Pastikan flowbite juga terdeteksi
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Figtree', ...defaultTheme.fontFamily.sans ],
            },
            keyframes: {
                'zoom-out': {
                    '0%': { transform: 'scale(1.1)', opacity: '0' },
                    '100%': { transform: 'scale(1)', opacity: '1' },
                },
            },
            animation: {
                'zoom-out': 'zoom-out 0.7s ease-in-out',
            },
        },
    },

    plugins: [
        forms,
        require( 'flowbite/plugin' )( {
            datatables: true,
        } ),
    ],
};
