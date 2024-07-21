import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import {
	QueryClient,
	QueryClientProvider,
} from '@tanstack/react-query'
import { Flowbite } from 'flowbite-react'
import App from './App'
import { PagesContextProvider } from './core/pagesContext'

const queryClient = new QueryClient()

ReactDOM.createRoot(document.getElementById('root')!).render(
	<React.StrictMode>
		<QueryClientProvider client={queryClient}>
			<Flowbite>
				<PagesContextProvider>
					<App />
				</PagesContextProvider>
			</Flowbite>
		</QueryClientProvider>
	</React.StrictMode >,
)
