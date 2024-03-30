/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    {
      pattern: /bg-(red|green|yellow)/,
    },
  ],
  theme: {
    colors: {
      transparent: 'transparent',
      'white': '#ffffff',
      'black': '#000000',
      'dark': '#16151C',
      'gray': '#A2A1A8',
      'purple': '#7152F3',
      'green': '#A3D139',
      'red': '#F45B69',
      'magenta': '#B21589',
      'yellow': '#EFBE12',
    },
    fontSize: {
      xs: ['12px', '16px'],
      sm: ['14px', '20px'],
      base: ['16px', '24px'],
      lg: ['20px', '28px'],
      xl: ['24px', '32px'],
      '2xl': ['28px', '36px'],
      '3xl': ['32px', '40px'],
      '4xl': ['36px', '46px'],
      '5xl': ['40px', '50px'],
      '6xl': ['60px', '60px'],
    },
    extend: {
      fontFamily: {
        lexend: ["Lexend", "sans-serif"],
      }
    },
  },
  plugins: [],
}