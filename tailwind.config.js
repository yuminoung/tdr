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
        'jetbrains-mono': ['JetBrains\\ Mono', 'monospace'],
        'reggae-one': ['Reggae\\ One', 'cursive'],
        'noto-sans-jp': ['Noto\\ Sans\\ JP', 'sans-serif'],
        'bebas-neue': ['Bebas\\ Neue', 'cursive'],
        'caveat': ['Caveat', 'cursive'],
        'satisfy': ['Satisfy', 'cursive'],
        'inconsolate': ['Inconsolata', 'monospace']
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
