const n = 4;
const m = 6;
const coup = 10;

class MasterMind {
  static random(max) {
    return Math.floor(1 + (Math.random() * max));
  }

  static getRandom(cb) {
    for (let i = 0; i < n; i++) {
      const x = MasterMind.random(m);
      cb[i] = x;
      console.log(x);
    }
  }

  static askTry(cb) {
    let r = prompt("Entrez la combinaison : ");
    let x = -1;
    while (++x < n) {
      cb[x] = +r[x];
    }
  }

  static compare(computer, cb2, answer) {
    let cb1 = [...computer];
    let bull = 0;
    let c = 0;

    //? Calculate bulls
    for (let i = 0; i < n; i++) {
      console.log({ i, cb1: cb1.join(''), cb2: cb2.join(''), answer: answer.join('') });
      if (cb1[i] == cb2[i]) {
        cb1[i] = 0;
        cb2[i] = 0;
        console.log({ c });
        answer[c++] = '#';
        ++bull;
      }
    }

    console.log('--------------------------------');

    //? Calculate cows
    for (let i = 0; i < n; i++) {
      console.log({ i, cb1: cb1.join(''), cb2: cb2.join(''), answer: answer.join('') });
      if (cb1[i] == 0) continue;
      for (let j = 0; j < n; j++) {
        if (cb1[i] == cb2[j]) {
          cb1[i] = 0;
          cb2[j] = 0;
          console.log({ c });
          answer[c++] = 'O';
          break;
        }
      }
    }

    return bull == n;
  }
}


let k = 0;
let laCombinaison = [];
let combinaison = [];
let reponse = [];
MasterMind.getRandom(laCombinaison);
// laCombinaison = [1, 2, 3, 4];
while (k++ < coup) {
  MasterMind.askTry(combinaison);
  const solved = MasterMind.compare(laCombinaison, combinaison, reponse);
  console.log({
    solved,
    laCombinaison: laCombinaison.join(''),
    combinaison: combinaison.join(''),
    reponse: reponse.join('')
  });
  reponse.length = 0;
  if (solved) {
    console.log('SOLVED');
    break;
  }
}