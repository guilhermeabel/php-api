import figlet from "figlet";
import html from 'bun-plugin-html';

const server = Bun.serve({
	fetch() {
		const body = figlet.textSync("Bun!");

		return new Response(body);
	},
	port: 3000,
});


await Bun.build({
	entrypoints: ['./src/index.html'],
	outdir: './build',
	plugins: [
		html()
	],
});
