<?php


/** Router Alias. */
use Core\Router;
use Helpers\Hooks;

/* Define routes. */
Router::any('', 'Controllers\PagesController@index');

Router::any('qadmin', 'Controllers\AdminController@index');
Router::any('login', 'Controllers\AuthController@login');
Router::any('logout', 'Controllers\AuthController@logout');


Router::any('qadmin/pages', 'Controllers\AdminPagesController@index');
Router::any('qadmin/pages/add', 'Controllers\AdminPagesController@createPage');
Router::any('qadmin/pages/edit/(:num)', 'Controllers\AdminPagesController@editPage');
Router::any('qadmin/pages/delete/(:num)', 'Controllers\AdminPagesController@deletePage');

Router::any('qadmin/menu', 'Controllers\AdminMenuController@index');
Router::any('qadmin/menu/add', 'Controllers\AdminMenuController@createMenu');
Router::any('qadmin/menu/edit/(:num)', 'Controllers\AdminMenuController@editMenu');
Router::any('qadmin/menu/delete/(:num)', 'Controllers\AdminMenuController@deleteMenu');
Router::any('qadmin/menu/delete-item/(:num)', 'Controllers\AdminMenuController@deleteMenuItem');

Router::any('qadmin/content-area', 'Controllers\AdminContentAreaController@index');
Router::any('qadmin/content-area/add', 'Controllers\AdminContentAreaController@createContentArea');
Router::any('qadmin/content-area/edit/(:num)', 'Controllers\AdminContentAreaController@editContentArea');
Router::any('qadmin/content-area/delete/(:num)', 'Controllers\AdminContentAreaController@deleteContentArea');

Router::any('qadmin/media', 'Controllers\AdminMediaController@index');
Router::any('qadmin/site-settings', 'Controllers\AdminSettingsController@siteSettings');
Router::any('qadmin/theme-settings', 'Controllers\AdminSettingsController@themeSettings');

Router::any('(:all)', 'Controllers\PagesController@pages');


/* Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/* If no route found. */
Router::error('Core\Error@index');

/* Turn on old style routing. */
Router::$fallback = false;

/* Execute matched routes. */
Router::dispatch();
