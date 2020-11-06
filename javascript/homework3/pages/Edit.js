import { Api } from '../ApiService.js';
import { createMatchForm } from '../createMatchForm.js';
import { Dom } from '../DomService.js';

export const Edit = async ctx => {
  if (ctx.id === '')
    window.location.hash = "#";
  const $r = Dom.create('div');
  Dom.dangerouslySetHTML(
    $r,
    '<img src="/assets/loader.gif" alt="loading" title="loading" loading="lazy" class="loader">'
  );
  createMatchForm(
    Api.getMatchByID(ctx.id),
    {
      action: Api.updateMatch,
      text: 'Update Match'
    })
    .then(el => {
      Dom.empty($r);
      Dom.wrap(el, $r);
    });
  return $r;
};