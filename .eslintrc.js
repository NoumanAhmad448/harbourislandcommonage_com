module.exports = {
    env: {
        node: true,
        browser: true,
        jquery: true,
        $: true,
        debug_logs: true,
        update_field: true,
        define: true,
        successCall: true,
        errCall: true,
    },
    globals: {
        errCall: "readonly",
        successCall: "readonly",
    },
    parserOptions: {
        ecmaVersion: 2022,
        sourceType: "module",
    },
};
