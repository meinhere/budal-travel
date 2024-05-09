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
            backgroundImage: {
                "landing-page": "url('/public/img/bg/background-landing.jpg')",
                "landing-page-2":
                    "url('/public/img/bg/background-landing2.jpg')",
                "landing-page-detail":
                    "url('/public/img/bg/background-detail.jpg')",
            },
            colors: {
                "primary-base": "#FFE5F1",
                "primary-300": "#FF62BD",
                "primary-200": "#FFAAD5",
                "secondary-base": "#3C486B",
                "secondary-100": "#D9DDEC",
                "grey-100": "#EDEBEC",
            },
        },
    },

    plugins: [forms],
};
