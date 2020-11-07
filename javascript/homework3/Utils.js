export const Utils = {
  storage: {
    getJSON: key => {
      try {
        const ret = JSON.parse(localStorage.getItem(key));
        console.log(ret);
        return ret;
      } catch (e) {
        return null;
      }
    },
    setJSON: (key, item) => {
      localStorage.setItem(key, JSON.stringify(item));
    }
  }
}