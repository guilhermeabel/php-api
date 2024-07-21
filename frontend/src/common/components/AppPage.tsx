import Homepage from "../../pages/home";

const AppPages = {
	"home": Homepage,
}

export type Page = keyof typeof AppPages;

const AppPage = ({ page }: { page: Page }) => {
	const Page = AppPages[page];
	return <Page />;
}

export default AppPage;
