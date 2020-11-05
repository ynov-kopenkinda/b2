class RomanConverter {

  static toDecimal(romanString) {
    let num = 0;
    romanString = romanString.split('');
    const letters = RomanConverter.letters;
    for (let i = 0; i < romanString.length; i++) {
      if (i != romanString.length) {
        const letterGroup = romanString[i] + romanString[i + 1];
        if (letters.includes(letterGroup)) {
          num += RomanConverter.dict[letterGroup];
          i += 1;
          continue;
        } else {
          num += RomanConverter.dict[romanString[i]];
        }
      }
    }
    return num;
  }

  static toRoman(num) {
    let result = '';
    RomanConverter.order.forEach(order => {
      while (num >= order) {
        const convertedPart = Object
          .entries(RomanConverter.dict)
          .filter(x => x[1] === order)[0][0];
        result += convertedPart;
        num -= order;
      }
    });
    return result;
  }
}
RomanConverter.dict = {
  'I': 1,
  'IV': 4,
  'V': 5,
  'IX': 9,
  'X': 10,
  'L': 50,
  'C': 100,
  'D': 500,
  'M': 1000,
};
RomanConverter.order = [1000, 500, 100, 50, 10, 9, 5, 4, 1];
RomanConverter.letters = ['M', 'D', 'C', 'L', 'X', 'IX', 'V', 'IV', 'I'];


module.exports = RomanConverter;