import { useMutation, useQueryClient } from "@tanstack/react-query";

export default function useCreateTodo() {
	const queryClient = useQueryClient();

	return useMutation({
		mutationFn: async (todo: { id: number; title: string }) => {
			const response = await fetch("/api/todos", {
				method: "POST",
				body: JSON.stringify(todo),
				headers: {
					"Content-Type": "application/json",
				},
			});
			return response.json();
		},
		onSuccess: () => {
			queryClient.invalidateQueries({ queryKey: ["todos"] });
		},
	});
}	
