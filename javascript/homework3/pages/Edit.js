import { Api } from '../ApiService.js';
import { Dom } from '../DomService.js';

/**
 * <form>
 *  t s1 s2 t
 * </form>  
*/

export const Edit = async ctx => {
  console.log('a');
  if (ctx.id === '')
    globalThis.location.hash = "#";
  const $r = Dom.create('h1');
  Dom.setText($r, 'ID: ' + ctx.id);
  const match = await Api.getMatchByID(ctx.id);
  const pre = Dom.create('pre');
  Dom.dangerouslySetHTML(pre, JSON.stringify(match, null, 2));
  Dom.wrap(pre, $r);
  return $r;
};