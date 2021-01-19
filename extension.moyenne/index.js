function run($btn) {
  if (document.getElementById('GInterface.Instances[1]_messagePage') !== null) {
    $btn.innerText = '...';
    $btn.onclick = () => { };
    const cells = [...document.querySelectorAll('.jiehint')].map(x => x.parentNode.parentNode).filter(x => x.tagName == 'TD');
    const formatted = [];
    cells.forEach(cell => {
      const data = cell.innerText
        .split('Coeff. ')
        .map(x => x
          .replace(/ /g, '')
          .replace(/\,/g, '.')
          .trim());
      const f = {};
      f.coef = data[1] !== undefined ? +data[1] : 1;
      if (data[0].indexOf('/') !== -1) {
        const [note, sur] = data[0].split('/');
        f.note = +note / +sur * 20;
      } else {
        f.note = +data[0];
      }
      formatted.push(f);
    });
    const [sommeNote, sommeCoef] = formatted.reduce((acc, v) => {
      acc[0] += v.note * v.coef;
      acc[1] += v.coef;
      return acc;
    }, [0, 0]);
    $btn.innerText = (sommeNote / sommeCoef).toFixed(2);
  } else {
    document.querySelector('li[data-genre="NOTATION.RELEVENOTES"]').click();
    setTimeout(() => run($btn), 1000);
  }
}

function addButton() {
  const $btn = document.createElement('button');
  $btn.style = `
  position: fixed;
  bottom: 1rem;
  left: 1rem;
  border: 1px solid black;
  color: black;
  background-color: white;
  height: 3.5rem;
  border-radius: .75rem;
  display: block;
  cursor: pointer;
  font-weight: bold;
  `;
  $btn.innerText = 'Calculer la moyenne';
  $btn.onclick = () => run($btn);
  document.body.appendChild($btn);
}


if (window.location.host.startsWith('hp')) {
  addButton();
}