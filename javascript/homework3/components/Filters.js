import { Dom } from '../DomService.js';
import { FilterGroup } from './FilterGroup.js';


export const Filters = ctx => {
  const $r = Dom.create('div');
  Dom.wrap(FilterGroup(
    'Items per page',
    ctx.setFilters,
    'pageSize',
    [
      ['1', 1],
      ['5', 5],
      ['10', 10],
      ['50', 50],
    ],
    ctx.filters.pageSize
  ), $r);
  Dom.wrap(FilterGroup(
    'Sort by',
    ctx.setFilters,
    'sortBy',
    [
      ['Date ⬆', '-date'],
      ['Date ⬇', 'date'],
      ['Team #1', 'homeTeam'],
      ['Team #2', 'visitorTeam'],
    ],
    ctx.filters.sortBy
  ), $r);
  return $r;
};
