import AppFooter from "./common/components/AppFooter";
import AppNavbar from "./common/components/AppNavbar";
import AppPage from "./common/components/AppPage";
import { usePageContext } from "./core/usePageContext";

const App = () => {
	const [state] = usePageContext();

	return (
		<div className="min-h-screen flex flex-col container mx-auto px-4 justify-between">
			<div>
				<AppNavbar />
				<AppPage page={state.currentPage} />
			</div>
			<AppFooter />
		</div>
	);
}

export default App;
