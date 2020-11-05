const characterService = require( './CharacterService' );
console.clear();

const p1 = characterService.findPage( 0 );
const p2 = characterService.findPage( 1 );

console.log( {
  l1: p1.length,
  l2: p2.length,
  l: characterService.length
} );

characterService.findAllAsync(x => console.log(x));

console.log( characterService.findOlderThan( 40 ) );
