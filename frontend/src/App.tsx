import { Banner, Button, Card } from "flowbite-react";
import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query";
import { MdAnnouncement } from "react-icons/md";
import { HiX } from "react-icons/hi";

const getTodos = async () => {
	const response = await fetch("/api/todos");
	return response.json();
};

const postTodo = async (todo: { id: number; title: string }) => {
	const response = await fetch("/api/todos", {
		method: "POST",
		body: JSON.stringify(todo),
		headers: {
			"Content-Type": "application/json",
		},
	});
	return response.json();
}

function App() {
	const queryClient = useQueryClient();

	// Queries
	const query = useQuery({ queryKey: ["todos"], queryFn: getTodos });

	// Mutations
	const mutation = useMutation({
		mutationFn: postTodo,
		onSuccess: () => {
			// Invalidate and refetch
			queryClient.invalidateQueries({ queryKey: ["todos"] });
		},
	});

	return (
		<div>
			<Banner>
				<div className="flex w-full justify-between border-b border-gray-200 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-700">
					<div className="mx-auto flex items-center">
						<p className="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">
							<MdAnnouncement className="mr-4 h-4 w-4" />
							<span className="[&_p]:inline">
								New brand identity has been launched for the&nbsp;
								<a
									href="https://flowbite.com"
									className="inline font-medium text-cyan-600 underline decoration-solid underline-offset-2 hover:no-underline dark:text-cyan-500"
								>
									Flowbite Library
								</a>
							</span>
						</p>
					</div>
					<Banner.CollapseButton color="gray" className="border-0 bg-transparent text-gray-500 dark:text-gray-400">
						<HiX className="h-4 w-4" />
					</Banner.CollapseButton>
				</div>
			</Banner>
			<header>

				<Button onClick={() => mutation.mutate({ id: 1, title: "Buy milk" })}>
					Add todo
				</Button>
				{query.isLoading ? (
					<p>Loading...</p>
				) : query.isError ? (
					<p>Error</p>
				) : (
					<ul>
						{query.data.map((todo: { id: number; title: string }) => (
							<li key={todo.id}>{todo.title}</li>
						))}
					</ul>
				)}
			</header>

			<Card href="#" className="max-w-sm">
				<h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
					Noteworthy technology acquisitions 2021
				</h5>
				<p className="font-normal text-gray-700 dark:text-gray-400">
					Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
				</p>
			</Card>
		</div>

	);
}

export default App;
