import { characters } from './characters.js';
import { createListItem } from './createListItem.js';

const ul = document.querySelector('ul');

characters.forEach(character => {
  ul.appendChild(createListItem(
    `${character.firstName} ${character.lastName}`,
    `${character.age}`
  ));
});