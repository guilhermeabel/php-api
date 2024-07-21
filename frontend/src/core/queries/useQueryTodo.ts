import { useQuery } from "@tanstack/react-query";

export default function useQueryTodo() {
	return useQuery({
		queryKey: ["todos"],
		queryFn: async () => {
			return await fetch("/api/todos");
		}
	});
}
