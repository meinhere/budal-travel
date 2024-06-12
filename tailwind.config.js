import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            container: {
                center: true,
            },
            plugins: [require("flowbite/plugin")],
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-base": "#FFE5F1",
                "primary-300": "#FF62BD",
                "primary-200": "#FFAAD5",
                "secondary-base": "#3C486B",
                "secondary-100": "#D9DDEC",
                "secondary-200": "#ACB5D6",
                "grey-100": "#EDEBEC",
                "grey-200": "#C8C2C5",
            },
        },
    },

    plugins: [forms],
};
