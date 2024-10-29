import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "false",
    theme: {
        colors: {
            blacky: "#474543",
            yellowy: "#F3B917",
            ye: "#F4C612",
            white: "#ffffff",
        },
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", ...defaultTheme.fontFamily.sans],
                Alumni: ["Alumni", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
