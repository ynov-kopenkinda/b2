const Converter = require('./converter');

describe('Roman Converter tests', () => {
  it('Should properly convert all the numbers', () => {
    expect(Converter.toDecimal('I')).toBe(1);
    expect(Converter.toDecimal('II')).toBe(2);
    expect(Converter.toDecimal('VII')).toBe(7);
    expect(Converter.toDecimal('XI')).toBe(11);
    expect(Converter.toDecimal('XIX')).toBe(19);
    expect(Converter.toDecimal('MMDL')).toBe(2550);
    expect(Converter.toDecimal('MMMMMMMMMDCLXXXIV')).toBe(9684);
  });

  it('Should properly convert all numbers to Roman', () => {
    expect(Converter.toRoman(1)).toBe('I');
    expect(Converter.toRoman(2)).toBe('II');
    expect(Converter.toRoman(3)).toBe('III');
    expect(Converter.toRoman(4)).toBe('IV');
    expect(Converter.toRoman(5)).toBe('V');
    expect(Converter.toRoman(9)).toBe('IX');
    expect(Converter.toRoman(10)).toBe('X');
    expect(Converter.toRoman(2550)).toBe('MMDL');
    expect(Converter.toRoman(9684)).toBe('MMMMMMMMMDCLXXXIV');
  });
});