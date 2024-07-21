import { Card } from "flowbite-react";
// import useCreateTodo from "../../core/mutations/useCreateTodo";

const Homepage = () => {
	// const mutation = useCreateTodo()

	return (<>
		<Card href="#" className="max-w-sm mb-5">
			<h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
				Noteworthy technology acquisitions 2021
			</h5>
			<p className="font-normal text-gray-700 dark:text-gray-400">
				Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
			</p>
		</Card>
		<Card href="#" className="max-w-sm mb-5">
			<h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
				Noteworthy technology acquisitions 2021
			</h5>
			<p className="font-normal text-gray-700 dark:text-gray-400">
				Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
			</p>
		</Card>
	</>);
}

export default Homepage;
