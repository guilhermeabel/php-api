import { Section } from "./components/Section";
import { Panel } from "../../layout/panel";

export const Index = () => {
	return (
		<div className="home">
			<Panel>
				<h1>Home</h1>
				<p>Welcome to the home page!</p>
				<Section />
			</Panel>
		</div>
  	);
}
