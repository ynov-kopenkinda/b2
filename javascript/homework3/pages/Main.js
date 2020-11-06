import { Api } from '../ApiService.js';
import { Dom } from '../DomService.js';

export const Main = globalContext => {
  const $r = Dom.create('div');
  const data = Api.getAllMatchesDelayed();
  data
    .then(matches => {
      Dom.empty($r);
      Dom.wrap(Match({
        homeTeam: 'Home Team', score: 'Score', visitorTeam: 'VisitorTeam'
      }, ''), $r);
      Dom.wrap(Dom.create('hr'), $r);
      matches.forEach((match, i) => {
        Dom.wrap(Match(match, i, globalContext), $r);
      });

      const addNew = Dom.create('button');
      Dom.listen(addNew, 'click', e => {
        window.location.hash = "#new";
      });
      Dom.setText(addNew, 'Add new match');
      Dom.addClass(addNew, 'add-match');
      Dom.wrap(addNew, $r);
    });
  Dom.addClass($r, 'matches-container');
  Dom.dangerouslySetHTML(
    $r,
    '<img src="/assets/loader.gif" alt="loading" title="loading" loading="lazy" class="loader">'
  );
  return $r;
};

const createActions = (gc, match) => {

  const edit = Dom.create('button');
  Dom.addClass(edit, 'btn', 'edit-match');
  Dom.setText(edit, 'Edit');

  Dom.listen(edit, 'click', e => {
    e.preventDefault();
    gc.id = match.id;
    localStorage.setItem('match-id', match.id);
    window.location.hash = '#edit';
  });

  const del = Dom.create('button');
  Dom.addClass(del, 'btn', 'delete-match');
  Dom.setText(del, 'Delete');
  Dom.listen(del, 'click', e => {
    e.preventDefault();
    const sure = window.confirm('Are you sure you want to delete this match?');
    if (sure) {
      Api.deleteMatch(match.id)
        .then(async () => {
          console.log('Match deleted successfully');
          await Api.sleep(1000);
          window.location.reload();
        });
    }
  });

  return [edit, del];
};

const Match = (match, i, ctx) => {
  const container = Dom.create('div');
  const homeTeam = Dom.create('div');
  const score = Dom.create('div');
  const visitorTeam = Dom.create('div');
  let actions = null;
  if (ctx != null)
    actions = createActions(ctx, match);

  Dom.setAttr(container, 'data-index', i);
  Dom.addClass(container, 'match');

  Dom.setText(homeTeam, match.homeTeam);
  Dom.addClass(homeTeam, 'home-team', 'team');
  if (typeof match.score === 'string')
    Dom.setText(score, match.score);
  else {
    if (match.score[0] > match.score[1])
      Dom.addClass(homeTeam, 'winner');
    if (match.score[0] < match.score[1])
      Dom.addClass(visitorTeam, 'winner');
    Dom.setText(score, match.score.join(' - '));
  }
  Dom.addClass(score, 'score');

  Dom.setText(visitorTeam, match.visitorTeam);
  Dom.addClass(visitorTeam, 'visitor-team', 'team');

  Dom.wrap(homeTeam, container);
  Dom.wrap(score, container);
  Dom.wrap(visitorTeam, container);
  if (actions != null)
    actions.forEach(action => Dom.wrap(action, container));
  return container;
};