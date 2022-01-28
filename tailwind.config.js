const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: ["./resources/**/*.blade.php"],
    theme: {
        extend: {},
        fontFamily: {
            sans: ['"Titillium Web"', ...defaultTheme.fontFamily.sans],
        },
    },
    plugins: [require("@tailwindcss/forms"), require("tailwind-scrollbar")],
    variants: {
        scrollbar: ["rounded"],
    },
};
