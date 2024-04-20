/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['IBM Plex Sans', 'sans-serif'],
            },
            spacing: {
                '46': '11.25rem',
            },
            gridTemplateRows: {
                '[auto,auto,1fr]': 'auto auto 1fr',
            }
        },
    },
    corePlugins: {
        aspectRatio: false,
    },
    plugins: [
        //require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require("daisyui"),
    ],
    daisyui: {
        themes: ["light", "dark", "synthwave"],
    },
}

