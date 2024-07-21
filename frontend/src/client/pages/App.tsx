import { Index } from './index/index';

type Tabs = {
  [key: string]: JSX.Element;
};

const tabs : Tabs = {
  home: <Index />,
  // about: <About />,
  // contact: <Contact />,
};

export const App = ({ tab }: { tab: keyof Tabs }) => {
  return tabs[tab] || <div>Tab not found</div>;
};
