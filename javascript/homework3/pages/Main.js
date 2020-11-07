import { Api } from '../ApiService.js';
import { Dom } from '../DomService.js';
import { Match } from '../components/Match.js';
import { Pagination } from '../components/Pagination.js';
import { Filters } from '../components/Filters.js';
import { events } from '../EventEmmiter.js';

export const Main = ctx => {
  const $r = Dom.create('div');
  const data = Api.getRawMatchesDelayed(ctx, 1000);
  data
    .then(response => {
      ctx.page.count = Math.ceil(+response.headers.get('X-Total-Count') / ctx.filters.pageSize);
      return response.json();
    })
    .then(matches => {
      Dom.empty($r);
      if (matches.length === 0) {
        Dom.dangerouslySetHTML($r, '<h1>No Matches Found</h1>');
        if (ctx.page.count >= 1) {
          const reset = Dom.create('button');
          Dom.addClass(reset, 'btn');
          Dom.listen(reset, 'click', () => {
            ctx.setPage(1);
          });
          Dom.setText(reset, 'Go to the 1st page');
          Dom.wrap(reset, $r);
        }
        return;
      }
      Dom.wrap(Match({
        homeTeam: 'Home Team', score: 'Score', visitorTeam: 'VisitorTeam'
      }, ''), $r);
      Dom.wrap(Dom.create('hr'), $r);
      matches.forEach((match, i) => {
        Dom.wrap(
          Match(match, i + ((ctx.page.current - 1) * ctx.filters.pageSize), ctx),
          $r
        );
      });

      const controls = Dom.addClass(Dom.create('div'), 'controls');
      Dom.wrap(Filters(ctx), controls);
      Dom.wrap(Pagination(ctx), controls);

      const addNew = Dom.create('button');
      Dom.listen(addNew, 'click', e => {
        window.location.hash = "#new";
      });
      Dom.setText(addNew, 'Add new match');
      Dom.addClass(addNew, 'add-match');

      Dom.wrap(controls, $r);
      Dom.wrap(addNew, $r);
    })
    .catch(e => {
      Dom.empty($r);
      Dom.wrap(
        Dom.setText(Dom.create('h1'), 'Could not fetch matches'),
        $r
      );
      Dom.wrap(
        Dom.setText(Dom.create('p'), JSON.stringify(e.message)),
        $r
      );
      const btn = Dom.setText(Dom.addClass(Dom.create('button'), 'btn'), 'Retry');
      Dom.listen(btn, 'click', () => events.emit('re-render'));
      Dom.wrap(
        btn,
        $r
      );
    });
  Dom.addClass($r, 'matches-container');
  Dom.dangerouslySetHTML(
    $r,
    '<img src="/assets/loader.gif" alt="loading" title="loading" loading="lazy" class="loader">'
  );
  return $r;
};