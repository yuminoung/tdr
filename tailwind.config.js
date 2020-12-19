module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        'oswald': ['Oswald', 'sans-serif'],
        'padauk': ['Padauk', 'sans-serif'],
        'jetbrains-mono': ['JetBrains\\ Mono', 'monospace']
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
