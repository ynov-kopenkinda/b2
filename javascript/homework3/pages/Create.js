import { Api } from '../ApiService.js';
import { MatchForm } from '../components/MatchForm.js';


export const Create = async ctx => {
  const $r = MatchForm(
    {},
    {
      action: Api.createMatch,
      text: 'Create Match'
    });
  return $r;
};