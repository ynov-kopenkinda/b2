import { Create } from './pages/Create.js';
import { Edit } from './pages/Edit.js';
import { Main } from './pages/Main.js';

export const routes = [
  { paths: ['', '#main'], page: Main, pageName: 'Matches' },
  { paths: ['#edit'], page: Edit, pageName: 'Edit Match' },
  { paths: ['#new'], page: Create, pageName: 'Create Match' }
];