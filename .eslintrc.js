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
    // 'eslint:recommended',
    'plugin:vue/recommended',
    'plugin:prettier/recommended'
  ],
  plugins: [
    'vue',
    'prettier'
  ],
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'vue/attributes-order': 'off',
    'vue/html-self-closing': ['error', {
      html: {
        void: 'never',
        normal: 'never',
        component: 'never'
      },
      svg: 'never',
      math: 'never'
    }],
    'vue/max-attributes-per-line': 'off',
    'vue/no-unused-vars': 'off',
    'vue/no-v-html': 'off'
  }
}
