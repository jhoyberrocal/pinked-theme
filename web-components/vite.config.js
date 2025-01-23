import {defineConfig} from "vite";
import {resolve} from "path";

export default defineConfig({
    build: {
        lib: {
            entry: 'src/index.js',
            formats: ['es']
        },
    }
})