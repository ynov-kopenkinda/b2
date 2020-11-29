module.exports = (homeTeam, visitorTeam, score, date) => ({
  homeTeam,
  visitorTeam,
  score,
  date: date || new Date().toISOString(),
})
