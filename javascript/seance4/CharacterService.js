const Character = require( './Character' );

const characters = [
  {
    firstName: "Jean",
    lastName: "Kirschtein",
    age: 20
  },
  {
    firstName: "Lukas",
    lastName: "Scripted",
    age: 45
  },
  {
    firstName: "Mikasa",
    lastName: "Ackermann",
    age: 23
  },
  {
    firstName: "Eren",
    lastName: "Jaeger",
    age: 12
  },
  {
    firstName: "Armin",
    lastName: "Arlert",
    age: 18
  },
  {
    firstName: "Armin2",
    lastName: "Arlert2",
    age: 18
  },
];


module.exports = ( () => {

  const PAGE_SIZE = 5;

  const characterClasses = characters.map(
    ( { firstName, lastName, age } ) => new Character( firstName, lastName, age )
  );

  const find = predicate => {
    return characterClasses.filter( predicate );
  };

	const findAsync = (predicate, cb) => setTimeout(() => cb(find(predicate)), 1000);

  const findPage = page => characterClasses.slice( page * PAGE_SIZE, ( page + 1 ) * PAGE_SIZE );

const findPageAsync = (page, cb) => setTimeout(() => cb(findPage(page)), 1000);

  const findOlderThan = age =>
    characterClasses.filter( x => x.age < new Date( Date.now() - age * 1000 * 60 * 60 * 24 * 365.25 ) );

const findOlderThanAsync = (age, cb) => setTimeout(() => cb(findOlderThan(age)), 1000);

  const length = characterClasses.length;
  
  const findAllAsync = cb => {
	setTimeout(() => {
		cb(characterClasses);
	}, 1000);
  }
  return {
    serviceName: 'CharacterService',
    findAll: () => characterClasses,
    find,
	  findAsync,
    findPage,
	  findPageAsync,
    length,
    findOlderThan,
	  findOlderThanAsync,
    findAllAsync,
  };
} )();
