async function fetchJSON(url) {
  const data = await fetch(url);
  const text = await data.text();
  // return data.json();
  try {
    const json = JSON.parse(text);
    return json;
  } catch (e) {
    return text;
  }
}

(async function () {
  const characters = await fetchJSON('./characters.json');
  const ages = characters.map(character => character.age);
  const luke = characters[0];
  console.log(luke.name);
  console.log(characters, ages);
  const kanye = await fetchJSON('https://api.kanye.rest/');
  console.log(kanye);
})();