class Person {
  constructor ( name, surname, age ) {
    this.name = name;
    this.surname = surname;
    this.age = new Date( Date.now() - ( age * 1000 * 60 * 60 * 24 * 365.25 ) );
  }

  sayHello () {
    console.log( `Hello, my name is ${this.name} ${this.surname}.
I was born on ${this.age.toLocaleDateString} y.o` );
  }
}

module.exports = Person;