import { Api } from '../ApiService.js';
import { Dom } from '../DomService.js';
import { events } from '../EventEmmiter.js';


export const MatchActions = (gc, match) => {

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
          events.emit('re-render');
        });
    }
  });

  return [edit, del];
};
