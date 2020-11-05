console.clear();
const log = e => console.log(e);

const section = e => log(`\n\n-------\n${e}\n-------\n`);

const characters = [
  {
    firstName: "Jean",
    lastName: "Kirschtein",
    age: 24
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
  }
];


log('Array methods');

section('Age is even (filter, forEach)');
const evenAge = characters
  .filter((it) => !(it.age % 2));
evenAge.forEach(log);

section('Last Name Starts w/ "s" (filter, forEach)');
const sLastNames = characters
  .filter((it) => it.lastName.charAt(0).toLowerCase() === 's');
sLastNames.forEach(log);

section('Only first names and age < 40 (filter, forEach, map)');
const names = characters
  .filter(c => c.age <= 40)
  .map(c => c.firstName[0].toUpperCase() + c.firstName.slice(1).toLowerCase());
names.forEach(log);

// section('Sum of elements (reduce)');
// log([1, 2, 3, 4].reduce((a, b, xd, c) => {
//   console.log({ a, b, xd, c });
//   return a + b;
// }, 0));

// section('Reduce to an obj (reduce)');
// const obj = [['a', 10], ['b', 20]].reduce((acc, v) => {
//   acc[v[0]] = v[1];
//   return acc;
// }, {});
// log(obj);

section('Reduce to an obj (reduce)');
const characterNames = characters
  .reduce((acc, v, index, original) => acc + v.firstName + (index == original.length - 1 ? '' : ', '), '');
log(characterNames);

const tableCharacters = characters
  .reduce((acc, v) => {
    if (!acc[v.age]) {
      acc[v.age] = [];
    }
    acc[v.age].push(v.firstName);
    return acc;
  }, {});

log(tableCharacters);