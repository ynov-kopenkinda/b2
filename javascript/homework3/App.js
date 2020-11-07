import { Dom } from './DomService.js';
import { _404 } from './pages/404.js';
import { routes } from './router.js';
import { events } from './EventEmmiter.js';
import { Utils } from './Utils.js';

export const App = root => {

  let globalContext = {
    id: localStorage.getItem('match-id') || '',
    page: Utils.storage.getJSON('page') || {
      count: 1,
      current: 1,
    },
    filters: Utils.storage.getJSON('filters') || {
      pageSize: 10,
      sortBy: '-date',
    },
    setPage,
    setFilters,
  };

  function setPage(n = globalContext.page.current) {
    globalContext.page.current = n;
    Utils.storage.setJSON('page', globalContext.page);
    events.emit('re-render');
  }

  function setFilters(newFilters) {
    globalContext.filters = { ...globalContext.filters, ...newFilters };
    Utils.storage.setJSON('filters', globalContext.filters);
    globalContext.page.current = 1;
    events.emit('re-render');
  }

  const render = async part => {
    console.log(`Re-Render: "${part}"`);
    console.log('Current context', globalContext);
    const startTime = Date.now();
    let result = null;
    for (const route of routes) {
      if (route.paths.includes(part)) {
        result = await route.page(globalContext);
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

  const forceReRender = event => {
    if (event)
      event.preventDefault();
    Dom.empty(root);
    render(window.location.hash);
  };

  window.onhashchange = forceReRender;
  events.on('re-render', forceReRender);

  render(window.location.hash);

  return {
    ctx: globalContext,
    render: () => events.emit('re-render'),
  };
};