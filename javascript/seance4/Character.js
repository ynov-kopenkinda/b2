const Person = require( './Person' );

const DAYS = [
  'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri',
];

const MONTHS = [
  'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
];

class Character extends Person {
  constructor ( name, surname, age, movie ) {
    super( name, surname, age );
    this.movie = movie || "Interstellar";
  }
  sayHello () {
    console.log( `Hello, my name is ${this.name} ${this.surname},
I was born on ${this.getFormattedBirthDate()}.
I really like the movie "${this.movie}"!\n` );
  }
  getFormattedBirthDate () {
    return `${DAYS[ this.age.getDay() ]}, ` +
      `${this.age.getDate()} ` +
      `${MONTHS[ this.age.getMonth() ]} ` +
      `${this.age.getFullYear()}`;
  }
}


module.exports = Character;