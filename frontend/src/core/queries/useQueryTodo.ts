import { useQuery } from "@tanstack/react-query";
import axios from "axios";

export default function useQueryTodo() {
	return useQuery({
		queryKey: ["todos"],
		queryFn: async () => {
			return (await axios.get("/api/todos"));
		}

	});
}
