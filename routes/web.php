<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('login_view');
});

Route::post('/user_login', 'UserController@user_login');
Route::get('/home/index', 'Home\HomeController@index');

Route::get('/projects/index', 'Projects\ProjectsController@index');
Route::post('/projects/enter', 'Projects\ProjectsController@enter');
Route::get('/projects/change_project', 'Projects\ProjectsController@change_project');

Route::get('/website/manage_menu', 'Website\WebsiteController@manage_menu');
Route::post('/website/update_menu_order/{id}', 'Website\WebsiteController@update_menu_order');
Route::post('/website/create_menu_set', 'Website\WebsiteController@create_menu_set');
Route::post('/website/add_menu', 'Website\WebsiteController@add_menu');
Route::post('/website/edit_menu/{id}', 'Website\WebsiteController@edit_menu');
Route::get('/website/delete_menu/{id}', 'Website\WebsiteController@delete_menu');
Route::get('/website/delete_menu_set/{id}', 'Website\WebsiteController@delete_menu_set');

Route::get('/website/pages', 'Website\WebsiteController@pages');
Route::get('/website/create_page', 'Website\WebsiteController@create_page');
Route::post('/website/store_page', 'Website\WebsiteController@store_page');
Route::get('/website/edit_page/{id}', 'Website\WebsiteController@edit_page');
Route::post('/website/update_page', 'Website\WebsiteController@update_page');

Route::get('/rolepermission/module', 'Rolepermission\RolepermissionController@module');
Route::get('/rolepermission/add_modules', 'Rolepermission\RolepermissionController@add_modules');
Route::post('/rolepermission/store_modules', 'Rolepermission\RolepermissionController@store_modules');
Route::post('/rolepermission/reload_modules', 'Rolepermission\RolepermissionController@reload_modules');

Route::get('/rolepermission/edit_module/{id}', 'Rolepermission\RolepermissionController@edit_module');
Route::post('/rolepermission/update_module', 'Rolepermission\RolepermissionController@update_module');

Route::get('/rolepermission/delete_module/{id}', 'Rolepermission\RolepermissionController@delete_module');

Route::get('/rolepermission/roles', 'Rolepermission\RolepermissionController@roles');
Route::get('/rolepermission/set_privileges/{id}', 'Rolepermission\RolepermissionController@set_privileges');
Route::post('/rolepermission/get_controller', 'Rolepermission\RolepermissionController@get_controller');
Route::get('/rolepermission/add_role', 'Rolepermission\RolepermissionController@add_role');
Route::post('/rolepermission/store_role', 'Rolepermission\RolepermissionController@store_role');
Route::post('/rolepermission/update_role_privilege', 'Rolepermission\RolepermissionController@update_role_privilege');
Route::get('/rolepermission/system_users', 'Rolepermission\RolepermissionController@system_users');
Route::get('/rolepermission/add_system_user', 'Rolepermission\RolepermissionController@add_system_user');
Route::post('/rolepermission/store_system_user', 'Rolepermission\RolepermissionController@store_system_user');

Route::get('/logout', 'UserController@logout');

