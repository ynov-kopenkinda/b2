const Api = require('./setup');
const createMatch = require('./createMatch');

const teams = require('./teams.json');
const scores = [0, 1, 2, 3, 4, 5, 6];
const getRandom = arr => arr[Math.floor(Math.random() * arr.length)];

const createRandomMatch = () => {
  return createMatch(
    getRandom(teams),
    getRandom(teams),
    [
      getRandom(scores),
      getRandom(scores),
    ],
  );
}

(async () => {
  while (true) {
    let data = await Api.getLastMatch();
    if (data.length <= 0) break;
    matchToDelete = data[0].id;
    await Api.deleteMatch(matchToDelete);
    data = await Api.getLastMatch();
    console.log({ matchToDelete, data });
  }

  for (let j = 0; j < 15; j++) {
    await Api.createMatch(createRandomMatch());
  }

  console.log(createRandomMatch())
})()