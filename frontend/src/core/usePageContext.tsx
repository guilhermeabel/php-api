import { useContext } from "react";
import { PageContext } from "./pagesContext";

export const usePageContext = () => {
	const context = useContext(PageContext);
	if (!context) {
		throw new Error("usePageContext must be used within a PageContextProvider");
	}
	return context;
};
