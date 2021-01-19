let $button = null;

function run($btn) {
  if ($btn === null) return;
  if (document.getElementById('GInterface.Instances[1]_messagePage') !== null) {
    $btn.innerText = '...';
    // $btn.onclick = () => { };
    $btn.disabled = true;
    const rows = [...document.querySelector('.objetReleveTableDevoir').querySelectorAll('tr')];
    const groups = [];
    let group = {};
    for (let row of rows) {
      if (row.childElementCount === 1) {
        if (group.header === undefined) {
          group.header = row;
        } else {
          groups.push(group);
          group = {
            header: row,
          };
        }
      } else {
        group.children = group.children !== undefined ? group.children : [];
        group.children.push(row);
      }
    }
    groups.push(group);
    group = {};
    const formatted = groups.reduce((acc, v) => {
      const format = {};
      format.group = v.header;
      format.items = [];
      v.children.forEach(row => {
        const r = { header: row, items: [] };
        [...row.querySelectorAll('td')].forEach(item => {
          r.items.push(formatItem(item))
        })
        r.items = r.items.filter(x => x !== null);
        format.items.push(r);
      });
      acc.push(format);
      return acc;
    }, []);
    processFormatted(formatted, $btn);
  } else {
    document.querySelector('li[data-genre="NOTATION.RELEVENOTES"]').click();
    window.waitingForNotes = true;
  }
}

document.addEventListener('DOMSubtreeModified', () => {
  const shouldRun = window.waitingForNotes === true;
  if (shouldRun) {
    const shouldExist = [...document.querySelectorAll('td[colspan="3"]')].find(x => x.innerText.startsWith('Mati'));
    if (shouldExist !== undefined) {
      window.waitingForNotes = false;
      run($button);
    }
  }
})

function formatItem(item) {
  const formatted = {};
  const clear = item.innerText
    .trim()
    .split('Coeff. ')
    .map(x => x.replace(/ /g, '').replace(',', '.'));
  if (clear[0] === '') return null;
  if (clear[0].indexOf('/') !== -1) {
    const [note, sur] = clear[0].split('/');
    formatted.note = (+note) / (+sur) * 20;
  } else {
    formatted.note = +clear[0];
  }
  if (clear[1] !== undefined) {
    formatted.coef = +clear[1];
  } else {
    formatted.coef = 1;
  }
  return formatted;
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
  $button = $btn;
  document.body.appendChild($btn);
}

function processFormatted(data, $btn) {
  let noteGlobal = 0;
  let coefGlobal = 0;
  data.forEach(block => {
    let noteBlock = 0;
    let coefBlock = 0;
    block.items.forEach(line => {
      let noteLine = 0;
      let coefLine = 0;
      line.items.forEach(({note, coef}) => {
        noteLine += note * coef;
        coefLine += coef;
      })
      line.header.style.position = 'relative';
      line.header.appendChild(br(noteLine/coefLine));
      if (!isNaN(noteLine/coefLine)) {
        noteBlock += noteLine/coefLine;
        coefBlock += 1;
      }
    })
    block.group.appendChild(br(noteBlock/coefBlock));
    if (!isNaN(noteBlock/coefBlock)) {
      noteGlobal += noteBlock/coefBlock;
      coefGlobal += 1;
    }
  })
  $btn.innerText = `Moy.: ${(noteGlobal/coefGlobal).toFixed(2)}/20`;
  // $btn.disabled = false;

}


if (window.location.host.startsWith('hp')) {
  addButton();
}

function br(num) {
  const text = num.toFixed(2);
  const $el = document.createElement('span');
  $el.innerText = !isNaN(text) ? text : '';
  $el.style = `
  color: red;
  `;
  return $el;
}