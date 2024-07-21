import { DarkThemeToggle, Navbar } from "flowbite-react";

const AppNavbar = () => {
	return (
		<Navbar fluid rounded>
			<Navbar.Brand as={undefined} href="https://flowbite-react.com">
				<span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">Flowbite React</span>
			</Navbar.Brand>
			<Navbar.Toggle />
			<Navbar.Collapse>
				<Navbar.Link href="#" active>
					Home
				</Navbar.Link>
				<Navbar.Link as={undefined} href="#">
					About
				</Navbar.Link>
				<Navbar.Link href="#">Services</Navbar.Link>
				<Navbar.Link href="#">Pricing</Navbar.Link>
				<Navbar.Link href="#">Contact</Navbar.Link>
			</Navbar.Collapse>
			<DarkThemeToggle />
		</Navbar>
	);
}

export default AppNavbar;
