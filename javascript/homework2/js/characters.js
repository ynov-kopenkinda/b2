const characters = [
  {
    firstName: "Jean",
    lastName: "Kirschtein",
    age: 20,
    signed: false,
  },
  {
    firstName: "Lukas",
    lastName: "Scripted",
    age: 45,
    signed: false,
  },
  {
    firstName: "Mikasa",
    lastName: "Ackermann",
    age: 23,
    signed: false,
  },
  {
    firstName: "Eren",
    lastName: "Jaeger",
    age: 12,
    signed: false,
  },
  {
    firstName: "Armin",
    lastName: "Arlert",
    age: 18,
    signed: false,
  },
  {
    firstName: "Valentin",
    lastName: "Malo",
    age: 22,
    signed: false,
  },
];


export const characterService = ((c) => {
  let lastId = 0;
  let cs = c;

  function getAll() {
    return cs;
  }
  function getAllSorted() {
    return cs.sort((a, b) => b.signed - a.signed);
  }
  function get(id) {
    return cs.find(x => x._id == id);
  }
  function filter(cb) {
    return cs.filter(cb);
  }
  function del(id) {
    const i = index(id);
    const r = cs.splice(i, 1);
    save();
    return r;
  }
  function index(id) {
    const item = get(id);
    const i = cs.indexOf(item);
    return i;
  }
  function add({ firstName, lastName, age, signed }) {
    cs.unshift({
      firstName: firstName || 'John',
      lastName: lastName || 'Doe',
      age: age || 0,
      signed: signed || false,
      _id: ++lastId,
    });
  }
  function modify(id, character) {
    cs[index(id)] = { ...character };
  }
  function sign(id) {
    const i = index(id);
    console.log(id, i);
    cs[i].signed = !cs[i].signed;
  }
  function save() {
    localStorage.setItem('app-characters', JSON.stringify(cs));
  }
  function load(usePreset = false) {
    if (usePreset) {
      cs = c.map((x, i) => {
        lastId = i;
        return { ...x, _id: i };
      });
    } else {
      const items = localStorage.getItem('app-characters');
      try {
        if (items == null) throw '';
        cs = JSON.parse(items);
        cs = cs.sort((a, b) => b._id - a._id);
        lastId = cs[0]._id;
      } catch (e) {
        cs = [];
      }
    }
  }
  return {
    save,
    load,
    get,
    delete: del,
    modify,
    sign,
    add,
    filter,
    getAll,
    getAllSorted,
  };
})(characters);