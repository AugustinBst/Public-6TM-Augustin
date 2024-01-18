/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js,vue}"],
    theme: {
      extend: {},
    },
    plugins: [
        function ({ addUtilities }) {
          const newUtilities = {
            '.scale-10': {
              transform: 'scale(0.1)',
            },
            '.custom-grey': {
                backgroundColor: `rgb(47, 69, 71)`,
              },
            '.custom-blueGrey': {
                backgroundColor: `rgb(81, 118, 122)`,
            },
            '.custom-grey': {
                backgroundColor: `rgb(47, 69, 71)`,
            },
            '.custom-green': {
              backgroundColor: `#C1EDFB`,
            },
            '.custom-red': {
              backgroundColor: 'rgb(255, 0, 0, 50)',
            }
          };
          addUtilities(newUtilities, ['responsive', 'hover']);
        },
      ],
  }