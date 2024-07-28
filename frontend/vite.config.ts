import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
	plugins: [
		react(),
	],
	// build: {
	// 	lib: {
	// 		entry: './src/main.tsx',
	// 		name: 'App',
	// 		formats: ['es', 'cjs'],
	// 	},
	// 	outDir: './dist',
	// 	emptyOutDir: true,

	// },
})

