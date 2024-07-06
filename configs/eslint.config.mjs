import globals from "globals";
import pluginJs from "@eslint/js";
import { includeIgnoreFile } from "@eslint/compat";
import path from "node:path";
import { fileURLToPath } from "node:url";
import { FlatCompat } from "@eslint/eslintrc";

let filename = fileURLToPath(import.meta.url);
filename = filename.replace("configs\\", "")
const __filename = filename.replace("configs/", "")
const __dirname = path.dirname(__filename);
const gitignorePath = path.resolve(__dirname, ".gitignore");

const compat = new FlatCompat({
  baseDirectory: __dirname
});

export default [
  includeIgnoreFile(gitignorePath),
  ...compat.extends(".eslintrc.js"),
  {
    languageOptions: {
      ecmaVersion: 2022,
      sourceType: "module",
      globals: {
        ...globals.browser,
        ...globals.node,
        myCustomGlobal: "readonly",
      }
    },
    ignores: [".config/*", "node_modules/*", "vendor/*", "public/*", "css/*", "js/*",
      "resources\\js\\slick-1.8.1.min.js",
    ],
    linterOptions: {
      noInlineConfig: true
    },
    files: ["resources\\**\*.js"],
    rules: {
      "no-unused-vars": "warn",
      "no-undef" : "warn",
      "prefer-const": "warn"
    }
  },
  pluginJs.configs.recommended,
];