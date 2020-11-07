import { Dom } from '../DomService.js';


export const Pagination = ctx => {
  const $r = Dom.addClass(Dom.create('div'), 'pagination');
  const start = 1;
  const end = ctx.page.count;
  const current = ctx.page.current;
  const needLeftArrow = current !== start;
  const needRightArrow = current !== end;
  let buttons = [];
  if (needLeftArrow) {
    buttons.push(start);
  }
  if (current - 1 > start) {
    buttons.push('.');
  }
  buttons.push(current);
  if (current + 1 < end) {
    buttons.push('.');
  }
  if (needRightArrow) {
    buttons.push(end);
  }
  if (needLeftArrow) {
    Dom.wrap(
      Dom.listen(
        Dom.addClass(Dom.setText(Dom.create('button'), '🠔'), 'btn', 'pagination-button'),
        'click',
        (e) => {
          if (current > start) {
            ctx.setPage(current - 1);
          }
        }),
      $r
    );
  }
  buttons.forEach(button => {
    if (button === '.') {
      Dom.wrap(
        Dom.addClass(Dom.setText(Dom.create('span'), '.'), 'pagination-separator'),
        $r
      );
    } else {
      const goTo = Dom.create('button');
      Dom.setText(goTo, button);
      if (button === current) {
        Dom.addClass(goTo, 'active');
        Dom.setAttr(goTo, 'disabled', true);
      }
      Dom.addClass(goTo, 'btn', 'pagination-button');
      Dom.listen(goTo, 'click', (e) => {
        e.preventDefault();
        ctx.setPage(button);
      });
      Dom.wrap(goTo, $r);
    }
  });
  if (needRightArrow) {
    Dom.wrap(
      Dom.listen(
        Dom.addClass(Dom.setText(Dom.create('button'), '🠖'), 'btn', 'pagination-button'),
        'click',
        (e) => {
          if (current < end) {
            ctx.setPage(current + 1);
          }
        }),
      $r
    );
  }
  return $r;
};