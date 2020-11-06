const select = query => document.querySelector(query);
const selectAll = query => document.querySelectorAll(query);
const create = tag => document.createElement(tag);
const del = el => el.parentNode.removeChild(el);
const append = (child, parent) => parent.appendChild(child);
const addClass = (el, ...cls) => el.classList.add(...cls);
const removeClass = (el, cls) => el.classList.remove(cls);
const empty = el => el.innerHTML = '';
const setText = (el, text) => { el.innerText = text; return el; };
const dangerouslySetHTML = (el, html) => { el.innerHTML = html; return el; };
const setAttr = (el, attr, value) => { el.setAttribute(attr, value); return el; };
const listen = (el, event, listener) => el.addEventListener(event, listener);

export const Dom = {
  select,
  selectAll,
  create,
  delete: del,
  empty,
  wrap: append,
  addClass,
  removeClass,
  setText,
  dangerouslySetHTML,
  setAttr,
  listen,
};