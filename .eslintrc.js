module.exports = {
  root: true,
  env: {
    browser: true,
    jquery: true
  },
  parserOptions: {
    parser: 'babel-eslint',
  },
  extends: [
    "plugin:vue/recommended",
    "eslint:recommended",
  ],
  plugins: [
    'vue',
  ],
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'vue/attributes-order': 'off',
    'vue/html-self-closing': 'off',
    'vue/max-attributes-per-line': 'off',
    'vue/no-unused-vars': 'off',
    'vue/no-v-html': 'off',
  }
}
