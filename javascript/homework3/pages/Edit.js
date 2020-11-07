import { Api } from '../ApiService.js';
import { MatchForm } from '../components/MatchForm.js';
import { Dom } from '../DomService.js';
import { events } from '../EventEmmiter.js';

export const Edit = async ctx => {
  if (ctx.id === '')
    window.location.hash = "#";
  const $r = Dom.create('div');
  Dom.dangerouslySetHTML(
    $r,
    '<img src="/assets/loader.gif" alt="loading" title="loading" loading="lazy" class="loader">'
  );
  MatchForm(
    Api.getMatchByID(ctx.id),
    {
      action: Api.updateMatch,
      text: 'Update Match'
    })
    .then(el => {
      Dom.empty($r);
      Dom.wrap(el, $r);
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
    });;
  return $r;
};