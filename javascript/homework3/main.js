import { App } from './App.js';
import { Dom } from './DomService.js';
const $root = Dom.select('#app');
window.app = App($root);