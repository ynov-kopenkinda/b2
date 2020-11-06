import { Dom } from './DomService.js';



export const createMatchForm = (data, params) => {
  const edit = !(JSON.stringify(data) === '{}');
  const $form = Dom.create('form');

  const h1 = Dom.create('h1');
  Dom.dangerouslySetHTML(
    h1,
    `<h1><a href="#">🠔</a> ${params.text}</h1>`
  );

  const homeTeam = Dom.create('input');
  Dom.setAttr(homeTeam, 'type', 'text');
  Dom.setAttr(homeTeam, 'value', edit ? data.homeTeam : 'Dmitrii');

  const homeTeamScore = Dom.create('input');
  Dom.setAttr(homeTeamScore, 'type', 'number');
  Dom.setAttr(homeTeamScore, 'min', '0');
  Dom.setAttr(homeTeamScore, 'value', edit ? data.score[0] : 0);

  const visitorTeamScore = Dom.create('input');
  Dom.setAttr(visitorTeamScore, 'type', 'number');
  Dom.setAttr(visitorTeamScore, 'min', '0');
  Dom.setAttr(visitorTeamScore, 'value', edit ? data.score[1] : 0);

  const visitorTeam = Dom.create('input');
  Dom.setAttr(visitorTeam, 'type', 'text');
  Dom.setAttr(visitorTeam, 'value', edit ? data.visitorTeam : 'Robin');

  const submitForm = Dom.create('button');
  Dom.addClass(submitForm, 'btn');
  Dom.setText(submitForm, params.text);

  Dom.listen($form, 'submit', async (e) => {
    e.preventDefault();
    const newMatch = {
      homeTeam: homeTeam.value.trim(),
      visitorTeam: visitorTeam.value.trim(),
      score: [
        +homeTeamScore.value,
        +visitorTeamScore.value
      ],
      date: edit ? data.date : new Date(),
      id: edit ? data.id : undefined,
    };
    if ([newMatch.homeTeam, newMatch.visitorTeam].includes('')) {
      window.alert('Please enter all fields properly');
    } else {
      await params.action(newMatch);
      window.location.hash = '#';
    }
  });


  Dom.wrap(h1, $form);
  Dom.wrap(homeTeam, $form);
  Dom.wrap(homeTeamScore, $form);
  Dom.wrap(visitorTeamScore, $form);
  Dom.wrap(visitorTeam, $form);
  Dom.wrap(submitForm, $form);
  return $form;
};