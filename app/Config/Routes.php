<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('page/(:segment)', 'Home::page/$1');
$routes->get('contact', 'ContactController::index');
$routes->post('contact/submit', 'ContactController::submit');
$routes->get('api/map-locations', 'ApiController::mapLocations');

$routes->group('admin', static function ($routes) {
    $routes->match(['get', 'post'], 'login', 'Admin\\AuthController::login');
    $routes->get('logout', 'Admin\\AuthController::logout');

    $routes->get('/', 'Admin\\CmsController::index');
    $routes->get('cms/footprints', 'Admin\\CmsController::footprints');
    $routes->post('cms/footprints', 'Admin\\CmsController::saveFootprints');

    $routes->get('cms/(:segment)', 'Admin\\CmsController::section/$1');
    $routes->post('cms/(:segment)/save', 'Admin\\CmsController::saveSection/$1');
    $routes->post('cms/(:segment)/save/(:num)', 'Admin\\CmsController::saveSection/$1/$2');
    $routes->get('cms/(:segment)/delete/(:num)', 'Admin\\CmsController::deleteSection/$1/$2');

    $routes->get('map-markers', 'Admin\\CmsController::mapLocations');
    $routes->post('map-markers/save', 'Admin\\CmsController::saveMapLocation');
    $routes->post('map-markers/save/(:num)', 'Admin\\CmsController::saveMapLocation/$1');
    $routes->get('map-markers/delete/(:num)', 'Admin\\CmsController::deleteMapLocation/$1');

    // CMS Pages
    $routes->get('pages', 'Admin\\CmsController::pages');
    $routes->get('pages/create', 'Admin\\CmsController::pageEdit');
    $routes->get('pages/edit/(:num)', 'Admin\\CmsController::pageEdit/$1');
    $routes->post('pages/save', 'Admin\\CmsController::pageSave');
    $routes->post('pages/save/(:num)', 'Admin\\CmsController::pageSave/$1');
    $routes->get('pages/delete/(:num)', 'Admin\\CmsController::pageDelete/$1');
    $routes->post('pages/pdf-delete/(:num)', 'Admin\\CmsController::pagePdfDelete/$1');

    // Settings
    $routes->get('settings/global',     'Admin\\SettingsController::global');
    $routes->post('settings/global',    'Admin\\SettingsController::saveGlobal');
    $routes->get('settings/contact',    'Admin\\SettingsController::contact');
    $routes->post('settings/contact',   'Admin\\SettingsController::saveContact');
    $routes->get('settings/social',     'Admin\\SettingsController::social');
    $routes->post('settings/social',    'Admin\\SettingsController::saveSocial');
    $routes->get('settings/password',   'Admin\\SettingsController::password');
    $routes->post('settings/password',  'Admin\\SettingsController::savePassword');
    $routes->get('settings/submissions', 'Admin\\SettingsController::submissions');
    $routes->get('settings/submissions/delete/(:num)', 'Admin\\SettingsController::deleteSubmission/$1');
});
