const Api = require('./setup');
const createMatch = require('./createMatch');

const sleep = (ms) => new Promise(res => setTimeout(res, ms));

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

  // console.log('Starting deleting');

  // while (true) {
  //   let data = await Api.getLastMatch();
  //   if (data.length <= 0) break;
  //   matchToDelete = data[0].id;
  //   await Api.deleteMatch(matchToDelete);
  //   data = await Api.getLastMatch();
  //   console.log({ matchToDelete, data });
  // }

  // console.log('Data cleared...');

  sleep(1000).then(() => {
    console.log('Slept for 1 seconds')
  });
  sleep(2000).then(() => {
    console.log('Slept for 2 seconds')
  });
  sleep(3000).then(() => {
    console.log('Slept for 3 seconds')
  });
  sleep(4000).then(() => {
    console.log('Slept for 4 seconds')
  });
  sleep(5000).then(() => {
    console.log('Slept for 5 seconds')
  });
  console.log('Slept for 0 seconds')

  // console.log('Starting reset');

  // for (let j = 0; j < 15; j++) {
  //   await Api.createMatch(createRandomMatch());
  // }

  // console.log('Done...');
})()