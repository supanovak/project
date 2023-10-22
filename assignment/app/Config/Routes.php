<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/hello', 'Hello::index');

$routes->get('login', 'Login::index');
$routes->post('login/check_login', 'Login::check_login');
$routes->get('login/logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/check_register', 'Register::check_register');

$routes->get('secret_questions', 'Secret_questions::index');
$routes->post('secret_questions/submit_questions', 'Secret_questions::submit_questions');

$routes->post('upload/upload_file', 'Upload::upload_file');
$routes->post('upload/upload_multiple', 'Upload::upload_multiple');
$routes->get('upload', 'Upload::index');

$routes->get('profile', 'Profile::index');
$routes->get('edit_profile', 'Edit_profile::index');

$routes->get('post', 'Post::index');
$routes->post('post/post_question', 'Post::post_question');

$routes->get('chat', 'Chat::index');

$routes->get('home', 'Home::index');

$routes->get('hub', 'Hub::index');
$routes->post('hub/show_filtered', 'Hub::show_filtered');

$routes->get('favourite', 'Favourite::index');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
