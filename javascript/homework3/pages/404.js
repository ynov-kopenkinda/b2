import { Dom } from '../DomService.js';

export const _404 = () => Dom.dangerouslySetHTML(
  Dom.create('div'),
  '<h1>Page Not Found</h1><div><a href="#">Go back to Listings</a></div>'
);