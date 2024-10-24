import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                "black": "#000000",
                "gray": "#6B7280",
            },          
            fontFamily: {
                roboto: ['Roboto', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
