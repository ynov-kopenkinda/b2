console.clear();


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

const oldestCharacter = characters.reduce((acc, v) => {
  if (v.age > acc.age) return v;
  return acc;
});
console.log(oldestCharacter);


class Person {
  constructor (name, surname, age) {
    this.name = name;
    this.surname = surname;
    this.age = new Date(Date.now() - (age * 1000 * 60 * 60 * 24 * 365.25));
  }

  sayHello() {
    console.log(`Hello, my name is ${this.name} ${this.surname}.
I was born on ${this.age.toLocaleDateString} y.o`);
  }
}

class Character extends Person {
  constructor (name, surname, age, movie) {
    super(name, surname, age);
    this.movie = movie || "Interstellar";
  }
  sayHello() {
    console.log(`Hello, my name is ${this.name} ${this.surname},
I was born on ${this.age} y.o.
I really like the movie "${this.movie}"!\n`);
  }
}

const characterClasses = characters.map(
  ({ firstName, lastName, age }) => new Character(firstName, lastName, age)
);

characterClasses.forEach(c => c.sayHello());