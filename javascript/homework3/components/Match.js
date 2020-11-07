import { Dom } from '../DomService.js';
import { MatchActions } from './MatchActions.js';

export const Match = (match, i, ctx) => {
  const container = Dom.create('div');
  const homeTeam = Dom.create('div');
  const score = Dom.create('div');
  const visitorTeam = Dom.create('div');
  let actions = null;
  if (ctx != null)
    actions = MatchActions(ctx, match);

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