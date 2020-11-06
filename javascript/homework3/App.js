import { Dom } from './DomService.js';
import { _404 } from './pages/404.js';
import { routes } from './router.js';

export const App = root => {

  let globalContext = {
    id: localStorage.getItem('match-id') || '',
  };

  const render = async part => {
    console.log(`Re-Render: "${part}"`);
    const startTime = Date.now();
    let result = null;
    for (const route of routes) {
      if (route.paths.includes(part)) {
        result = await route.page(globalContext);
        globalContext.page = route.name;
        break;
      }
    }
    if (result == null) {
      result = _404();
    }
    Dom.wrap(result, root);
    const endTime = Date.now();
    console.log(`Took: ${endTime - startTime}ms.`);
  };

  window.onhashchange = event => {
    event.preventDefault();
    Dom.empty(root);
    render(window.location.hash);
  };
  render(window.location.hash);
};