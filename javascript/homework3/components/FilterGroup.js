import { Dom } from '../DomService.js';


export const FilterGroup = (groupName, action, key, values, compareTo) => {
  const $r = Dom.create('div');
  Dom.addClass($r, 'filter-group');
  const heading = Dom.create('strong');
  Dom.setText(heading, `${groupName}: `);

  values.forEach(([text, value]) => {
    const filter = Dom.setText(Dom.addClass(Dom.create('span'), 'filter-item'), text);
    console.log(text, key, value, compareTo);
    if (value == compareTo)
      Dom.addClass(filter, 'active');
    Dom.listen(filter, 'click', () => action({ [key]: value }));
    Dom.wrap(filter, heading);
  });

  Dom.wrap(heading, $r);
  return $r;
};