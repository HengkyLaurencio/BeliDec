/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    darkMode: "selector",

    theme: {
        colors: {
            transparent: colors.transparent,
            primary: {
                '100': '#0072FF',
                '200': '#82EEFD',
                '300': '#000000',
                '400': '#FFFFFF',
                '500': '#F2F2F2',
                '600': '#A6A6A6',
                '700': '#6F8FAF',
                '800': '#00FFFF',
                '900': '#2B2B2B',
                '1000' : '#30D5C8',
                '1100' : '#2ccf10',
                '1200' : '#da0e1c',
                '1300' : '#7B00FF',
                '1400' : '#9683EC',
                'dark': '#00008B'
            },
            text: {
                '100': '#FFFFFF',
                '200': '#000000',
                '300' : '#da0e1c',
                'dark': '#FFFFFF'
            },
            black: colors.black,
            white: colors.white,
            slate: colors.slate,
            gray: colors.gray,
            zinc: colors.zinc,
            neutral: colors.neutral,
            stone: colors.stone,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: colors.blue,
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
        },
        extend: {},
    },
    plugins: [
        // require('@tailwindcss/forms'),
    ],
}
