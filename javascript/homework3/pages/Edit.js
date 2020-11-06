import { Api } from '../ApiService.js';
import { createMatchForm } from '../createMatchForm.js';

export const Edit = async ctx => {
  if (ctx.id === '')
    window.location.hash = "#";
  const $r = createMatchForm(
    await Api.getMatchByID(ctx.id),
    {
      action: Api.updateMatch,
      text: 'Update Match'
    });
  return $r;
};