import { characterService } from './characters.js';
import { createListItem } from './createListItem.js';

characterService.load();
let filterText = "";

const ul = document.querySelector('ul.list');
const form = document.querySelector('form');
const filter = document.querySelector('#filter');

form.onsubmit = e => {
  e.preventDefault();
  const entries = [...new FormData(form).entries()];
  const data = entries.reduce((acc, [k, v]) => {
    acc[k] = v;
    return acc;
  }, {});
  characterService.add({
    firstName: data.name,
    lastName: data.surname,
    age: data.age,
  });
  render();
};

filter.oninput = (e) => {
  const ft = filter.value.toLowerCase().trim();
  filterText = ft;
  render();
};

function render() {
  let entries = null;
  if (filterText == "") {
    entries = characterService.getAllSorted();
  } else {
    entries = characterService.filter(x => {
      return x.firstName.toLowerCase().indexOf(filterText) != -1 ||
        x.lastName.toLowerCase().indexOf(filterText) != -1 ||
        `${x.age}`.indexOf(filterText) != -1 ||
        `${x.signed ? 'signed' : 'notsigned'}` == filterText;
    });
  }
  if (entries.length == 0) {
    ul.innerHTML = '<li class="list-item" style="text-align: center;">No characters 😢</li>';
    return;
  }
  ul.innerHTML = '';
  entries.forEach(character => {
    const li = createListItem(
      character,
      {
        delete: (e) => {
          e.preventDefault();
          characterService.delete(character._id);
          render();
        },
        modify: (e) => {
          const firstName = prompt('New first name', character.firstName);
          const lastName = prompt('New first name', character.lastName);
          const age = prompt('New first name', character.age);
          characterService.modify(character._id, {
            firstName,
            lastName,
            age
          });
          render();
        },
        sign: (e) => {
          console.log(character);
          characterService.sign(character._id);
          render();
        },
      }
    );
    ul.appendChild(li);
  });
  characterService.save();
}

document.querySelector('#preset-load').addEventListener('click', () => {
  characterService.load(true);
  render();
});

render();