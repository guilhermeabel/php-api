import { Footer } from "flowbite-react";

const AppFooter = () => {
	return (
		<Footer container className="mb-5">
			<Footer.Copyright href="#" by="Abel" year={2024} />
			<Footer.LinkGroup>
				<Footer.Link href="#">About</Footer.Link>
				<Footer.Link href="#">Contact</Footer.Link>
				<Footer.Link href="#">Github</Footer.Link>
			</Footer.LinkGroup>
		</Footer>
	);
}

export default AppFooter;
