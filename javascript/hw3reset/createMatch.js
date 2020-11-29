// module.exports = [
//   {
//     homeTeam: 'Paul Mourgues',
//     visitorTeam: 'Test Delete',
//     score: [2, 2],
//     date: '2020-12-03T00:00:00Z'
//   }
// ]

module.exports = (homeTeam, visitorTeam, score, date) => ({
  homeTeam,
  visitorTeam,
  score,
  date: date || new Date().toISOString(),
})