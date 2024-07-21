import { createContext, Dispatch, useReducer } from "react";
import { Page } from "../common/components/AppPage";

type State = {
	currentPage: Page
}

const initState: State = {
	currentPage: "home"
};

type Actions =
	{ type: "change-page", page: Page };

const pageReducer = (state: State, action: Actions): State => {
	switch (action.type) {
		case "change-page":
			return {
				...state,
				currentPage: action.page
			};

		default:
			return state;
	}
};

export const PageContext = createContext<[State: State, Dispatch: Dispatch<Actions>]>([initState, () => { }]);

type PageContextProviderProps = {
	children?: React.ReactNode;
}

export const PagesContextProvider: React.FC<PageContextProviderProps> = ({ children }) => {
	const [state, dispatch] = useReducer(pageReducer, { ...initState });
	return (
		<PageContext.Provider value={[state, dispatch]}>
			{children}
		</PageContext.Provider>
	);
};

