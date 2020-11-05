export function createListItem(text, hiddenText) {
  //? Create hidden element
  const hel = document.createElement('i');
  hel.innerText = hiddenText;
  hel.classList.add('hidden');

  //? Create list item
  const el = document.createElement('li');
  el.innerText = text + ' ';
  el.className = 'list-item';

  //? Append hidden element to the list item;
  el.appendChild(hel);

  //? Add click listener to show or hide the hidden item
  el.addEventListener('click', () => {
    hel.classList.toggle('hidden');
  });

  el.addEventListener('contextmenu', (e) => {
    e.preventDefault();
    const sure = confirm('Are you sure?');
    if (sure) {
      el.parentNode.removeChild(el);
    }
  });

  //? Return back the element
  return el;
}