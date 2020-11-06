import { Api } from '../ApiService.js';
import { createMatchForm } from '../createMatchForm.js';


export const Create = async ctx => {
  const $r = createMatchForm(
    {},
    {
      action: Api.createMatch,
      text: 'Create Match'
    });
  return $r;
};