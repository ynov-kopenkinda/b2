const requestOfType = type => (url, body, headers) => fetch(url, {
  method: type,
  body: JSON.stringify(body),
  headers: headers,
});

const get = requestOfType('GET');
const post = requestOfType('POST');
const put = requestOfType('PUT');
const del = requestOfType('DELETE');

const sleep = async n => new Promise((resolve) => {
  setTimeout(resolve, n);
});

const getJSON = url => get(url).then(data => data.json());
const getText = url => get(url).then(data => data.text());

const baseUrl = 'https://js-ingesup-b2.herokuapp.com';
const endpoints = {
  get: (id = '') => `${baseUrl}/matches/${id}?sort=-date`,
  create: () => `${baseUrl}/matches/`,
  update: (id) => `${baseUrl}/matches/${id}`,
  delete: (id) => `${baseUrl}/matches/${id}`,
};

export const Api = {
  raw: {
    baseUrl,
    endpoints,
    get,
    post,
    put,
    delete: del,
    getJSON,
    getText,
  },
  getAllMatches: () => getJSON(endpoints.get()),
  getAllMatchesDelayed: () => sleep(2000).then(() => getJSON(endpoints.get())),
  getMatchByID: id => getJSON(endpoints.get(id)),
  createMatch: match => post(endpoints.create(), match, { 'Content-Type': 'application/json' }),
  updateMatch: data => put(endpoints.update(data.id), data, { 'Content-Type': 'application/json' }),
  deleteMatch: id => del(endpoints.delete(id)),
  createRandomMatch: () => post(endpoints.create(), {
    date: new Date(),
    homeTeam: 'Manchester City',
    score: [3, 1],
    visitorTeam: 'Porto',
  }, { 'Content-Type': 'application/json' }),
  sleep,
};