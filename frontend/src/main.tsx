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
import { ReactQueryDevtools } from '@tanstack/react-query-devtools'

const queryClient = new QueryClient()

ReactDOM.createRoot(document.getElementById('root')!).render(
	<React.StrictMode>
		<QueryClientProvider client={queryClient}>
			<Flowbite>
				<PagesContextProvider>
					<App />
				</PagesContextProvider>
			</Flowbite>

			<ReactQueryDevtools />
		</QueryClientProvider>
	</React.StrictMode >,
)
