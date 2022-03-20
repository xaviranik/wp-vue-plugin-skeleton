module.exports = {
    env: {
        browser: true,
        amd: true,
        node: true,
    },
    extends: [
        // extend rules set
        'eslint:recommended',
        'plugin:vue/vue3-recommended',
        // 'plugin:vue/recommended' // Use this if you are using Vue.js 2.x.
    ],
    rules: {
        'vue/multi-word-component-names': 'off',
        'no-var': 'error',
        'vue/no-unused-vars': 'error',
        'no-extend-native': 0,
        'no-new': 0,
        'no-useless-escape': 0,
        'no-useless-constructor': 0,
        indent: [
            'error',
            4,
            {
                SwitchCase: 1,
            },
        ],
        'space-before-function-paren': [
            'error',
            {
                anonymous: 'always',
                named: 'always',
                asyncArrow: 'always',
            },
        ],
        semi: [ 'error', 'always' ],
        'comma-dangle': 0,
        'no-console': 0,
        'no-debugger': 0,
        'id-length': 0,
        'eol-last': 0,
        'object-curly-spacing': [ 'error', 'always' ],
        'array-bracket-spacing': [ 'error', 'always' ],
        'arrow-spacing': 'error',
        'no-multiple-empty-lines': 'error',
        'no-unused-vars': 'error',
        'spaced-comment': 'error',
        quotes: [ 'error', 'single', { allowTemplateLiterals: true } ],
        'no-unreachable': 'error',
        'keyword-spacing': 'error',
        'space-before-blocks': 'error',
        'semi-spacing': 'error',
        'comma-spacing': 'error',
        'key-spacing': 'error',
        'prefer-const': [
            'error',
            {
                destructuring: 'any',
                ignoreReadBeforeAssign: false,
            },
        ],
        'space-infix-ops': 2,
        'no-irregular-whitespace': 2,
        'no-trailing-spaces': 2,
        'vue/require-default-prop': 'off',
    },
};
