export function createListItem(character, callbacks) {
  //? Create hidden element
  const hel = document.createElement('i');
  hel.innerText = character.age;
  if (!character.signed) {
    hel.className = 'hidden';
  };

  //? Create list item
  const el = document.createElement('li');
  el.innerText = character.firstName + ' ' + character.lastName + ' ';
  el.className = 'list-item';
  // el.addEventListener('click', callbacks.modify);
  if (character.signed)
    el.style.color = "lime";

  //? cteate modify button
  const modify = document.createElement('button');
  modify.innerText = 'M';
  modify.onclick = callbacks.modify;

  //? createCheckbox
  const checkbox = document.createElement('input');
  checkbox.type = 'checkbox';
  checkbox.style.float = 'right';
  checkbox.checked = character.signed;

  checkbox.addEventListener('click', callbacks.sign);

  //? Append hidden element to the list item;
  el.appendChild(hel);
  //? Append checkbox to the list item
  el.prepend(modify);
  el.appendChild(checkbox);

  el.addEventListener('contextmenu', callbacks.delete);

  //? Return back the element
  return el;
}