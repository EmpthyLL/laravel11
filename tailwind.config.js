/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            screens: {
                xs: "480px",
                "2xl": "1536px",
                c1: "1100px",
                c2: "855px",
            },
        },
    },
    plugins: [],
};
