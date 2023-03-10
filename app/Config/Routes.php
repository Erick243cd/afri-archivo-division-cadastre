<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Auth::index');

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    //Protected routes
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/profile', 'Auth::profile');
    $routes->get('/settings', 'Auth::settings');

    $routes->get('/add-picture', 'Users::addImage');
    $routes->get('/save-picture', 'Users::saveImage');
    $routes->get('/add-user', 'Users::create');
    $routes->get('/add-member', 'Team::create');
    $routes->get('/change-pwd', 'Auth::change');

    //PCs
    $routes->get('/add-pc', 'Pcs::add');
    $routes->post('lotissement-by-commune', 'Pcs::getLotisByCommune');
    $routes->get('pcs-list', 'Pcs::index');
    $routes->post('fetch-pcs', 'Pcs::fetchPcs');
    $routes->get('delete-pc/(:any)', 'Pcs::deletePc/$1');
    $routes->get('edit-pc/(:any)', 'Pcs::editPc/$1');
    $routes->post('edit-pc/(:any)', 'Pcs::editPc/$1');
    $routes->post('change-pc-scanned-file/(:any)', 'Pcs::changeScannedFile/$1');
    $routes->get('change-pc-scanned-file/(:any)', 'Pcs::changeScannedFile/$1');

    //PV de Constat Mise En valeur
    $routes->get('add-pv-mise-en-valeur', 'MiseEnValeurs::add');
    $routes->post('add-pv-mise-en-valeur', 'MiseEnValeurs::add');


});

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    //Protected routes
    $routes->get('/login', 'Auth::index');
    $routes->get('/signup', 'Auth::signup');
});

$routes->post('tutors/create-event', 'Tutors::createEvent');

$setRoutes = [];

//Dashboards
$setRoutes['dashboard'] = 'Dashboard::index';

//Users
$setRoutes['add-user'] = 'Users::create';
$setRoutes['list-users'] = 'Users::index';
$setRoutes['active-user/(:any)'] = 'Users::active/$1';
$setRoutes['delete-user/(:any)'] = 'Users::deleteUser/$1';
$setRoutes['save-picture'] = 'Users::saveImage';

//Auth
$setRoutes['login'] = 'Auth::index';
$setRoutes['signup'] = 'Auth::signup';
$setRoutes['change-pwd'] = 'Auth::change';
$setRoutes['settings'] = 'Auth::settings';
$setRoutes['logout'] = 'Auth::logout';
$setRoutes['update-one-self'] = 'Auth::updateOneSelf';

//PCs


// $routes->set404Override(function(){
//     echo view('errors/html/error_404.php');
// });

$routes->map($setRoutes);

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}