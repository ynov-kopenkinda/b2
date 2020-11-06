import { Edit } from './pages/Edit.js';
import { Main } from './pages/Main.js';

export const routes = [
  { paths: ['', '#main'], page: Main, pageName: 'Listings' },
  { paths: ['#edit'], page: Edit, pageName: 'Edit listing' }
];