console.clear();

const students = [
  { name: 'John', surname: 'Doe', age: 10 },
  { name: 'Jane', surname: 'Doe', age: 15 },
  { name: 'Jane', surname: 'Doe', age: 16 },
  { name: 'Martin', surname: 'Lt. King', age: 32 },
  { name: 'Bob', surname: 'Ross', age: 18 },
  { name: 'Phil', surname: 'Dr.', age: 19 },
];

const print = student => console.log(`${student.surname} ${student.name}, ${student.age}`);

console.log('3. ---- All Students ----');
for (const student of students)
  print(student);

console.log('4. ---- Adult Students ----');
for (const student of students)
  student.age > 18 && print(student);


console.log('5. ---- Students w/o age ----');
for (const student of students)
  console.log(student.name + ' ' + student.surname);

console.log('6. ---- Oldest student.1 ----');
print(students.sort((a, b) => b.age - a.age)[0]);

console.log('6. ---- Oldest student.2 ----');
let oldestStudent = students[0];
for (const student of students)
  if (student.age > oldestStudent.age)
    oldestStudent = student;
print(oldestStudent);

console.log('7. ---- Sorted students (age) ----');

for (let i = 0; i < students.length; i++) {
  for (let j = 0; j < students.length - i - 1; j++) {
    if (students[j].age > students[j + 1].age) {
      const intermed = students[j];
      students[j] = students[j + 1];
      students[j + 1] = intermed;
    }
  }
}

for (const student of students)
  print(student);


console.log('8. ---- Sorted students (name).1 ----');
const sortedNames = [...new Set(students.map(({ name }) => name))].sort();
for (const name of sortedNames)
  for (student of students.filter(student => student.name === name))
    print(student);

console.log('8. ---- Sorted students (name).2 ----');
for (const student of students.sort((a, b) => a.name > b.name ? 1 : a.name < b.name ? -1 : 0))
  print(student);
