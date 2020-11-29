const fetch = require('node-fetch');

const requestOfType = type => (url, body, headers) => fetch(url, {
  method: type,
  body: JSON.stringify(body),
  headers: headers,
});

const get = requestOfType('GET');
const post = requestOfType('POST');
const put = requestOfType('PUT');
const del = requestOfType('DELETE');

const getJSON = url => get(url).then(data => data.json());
const getText = url => get(url).then(data => data.text());

const baseUrl = 'https://js-ingesup-b2.herokuapp.com';
const endpoints = {
  get: (id = '') => `${baseUrl}/matches/${id}?sort=-date`,
  create: () => `${baseUrl}/matches/`,
  update: (id) => `${baseUrl}/matches/${id}`,
  delete: (id) => `${baseUrl}/matches/${id}`,
  getFiltered: ({ filters, page }) =>
    `${baseUrl}/matches/?sort=${filters.sortBy}&page=${page.current}&size=${filters.pageSize}`,
};

const Api = {
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
  getLastMatch: (i) => getJSON(endpoints.getFiltered({ filters: { pageSize: 1, sortBy: '-date' }, page: i+1 })),
  createMatch: match => post(endpoints.create(), match, { 'Content-Type': 'application/json' }),
  deleteMatch: id => del(endpoints.delete(id)),
  createRandomMatch: () => post(endpoints.create(), {
    date: new Date(),
    homeTeam: 'Manchester City',
    score: [3, 1],
    visitorTeam: 'Porto',
  }, { 'Content-Type': 'application/json' }),
};

module.exports = Api;