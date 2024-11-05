import path from "path";

const ROOT = path.resolve("../../../");
const BASE = __dirname.replace(ROOT, "");

export default {
    base: process.env.NODE_ENV === "production" ? `${BASE}/dist/` : BASE,
    build: {
        manifest: "manifest.json",
        assetsDir: ".",
        outDir: `dist`,
        emptyOutDir: true,
        rollupOptions: {
            input: ["assets/src/js/main.ts", "assets/src/css/output.css", "assets/src/css/editor.css"],
            output: {
                entryFileNames: "[hash].js",
                assetFileNames: "[hash].[ext]",
                chunkFileNames: "[hash].js"
            }
        }
    },
    plugins: [
        {
            name: "php",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".php") || file.endsWith(".css") || file.endsWith(".ts") || file.endsWith(".js")) {
                    server.ws.send({ type: "full-reload" });
                }
            }
        }
    ]
};
