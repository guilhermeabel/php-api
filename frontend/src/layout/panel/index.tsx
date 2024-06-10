import { ReactNode } from "react";

export const Panel = ({ children }: { children: ReactNode[] }) => {
	return (
		<div className="panel">
			{children}
		</div>
  	);
}
