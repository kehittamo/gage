/**
 * Main
 *
 * Handles routing and global imports.
 *
 * @since 1.0.0
 */

// import local dependencies
import $ from 'jquery';
import Router from './util/Router';
// Routes
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Example: 'About Us' page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
$(document).ready(() => routes.loadEvents());
