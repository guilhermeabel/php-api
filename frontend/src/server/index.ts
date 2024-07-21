import { readFileSync } from 'fs';
import { join } from 'path';

const indexHtml = readFileSync(join(process.cwd(), "public", "index.html"), "utf8");

const server = Bun.serve({
	fetch(req) {
		if (req.method === "GET") {
			const url = new URL(req.url);

			// Serve the index.html for all routes except known static files
			if (url.pathname === "/" || !url.pathname.includes(".")) {
				return new Response(indexHtml, {
					headers: {
						"Content-Type": "text/html",
					},
				});
			}

			// Serve static files
			try {
				const filePath = join(process.cwd(), "public", url.pathname);
				const file = readFileSync(filePath);
				const ext = filePath.split(".").pop() as keyof typeof mimeTypes;
				const mimeTypes = {
					html: "text/html",
					js: "application/javascript",
					css: "text/css",
					png: "image/png",
					jpg: "image/jpeg",
					svg: "image/svg+xml",
					json: "application/json",
				};
				return new Response(file, {
					headers: {
						"Content-Type": mimeTypes[ext] || "application/octet-stream",
					},
				});
			} catch (error) {
				return new Response("Not Found", { status: 404 });
			}
		}

		// Fallback for other methods
		return new Response("Method Not Allowed", { status: 405 });
	},
	port: 3000,
});

// await Bun.build({
// 	entrypoints: ['./src/client/index.tsx'],
// 	outdir: './public/build',
// 	target: 'bun',
// });


console.log(`Server running at http://localhost:3000`);
