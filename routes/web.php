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

Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/catalog', 'PageController@catalog')->name('catalog');
Route::get('/action', 'PageController@action')->name('action');
Route::get('/hardware', 'PageController@hardware')->name('hardware');
Route::get('/software', 'PageController@software')->name('software');
Route::get('/network', 'PageController@network')->name('network');
Route::get('/userinfo', 'PageController@userinfo')->name('userinfo');
Route::get('/hardwareline', 'PageController@hardwareline')->name('hardwareline');



Route::get('/welcome', function() {
    return View::make('welcome');
});



//example1
Route::get('/example1','Example1Controller@index');
Route::get('/get_soline/{soid}','Example1Controller@get_soline');
Route::post('/add','Example1Controller@add');

//catalog- hardwate
Route::post('/hardwarehead','CatalogController@select_hardwarehead');
Route::GET('/add_hardware','CatalogController@add_hardware');
Route::POST('/update_hardware','CatalogController@update_hardware');
Route::post('/hardwareheadline','CatalogController@select_hardwareheadline');
Route::GET('/getactive','CatalogController@select_getactive');
Route::GET('/add_hardwareline','CatalogController@add_hardwareline');
Route::POST('/update_hardwareline','CatalogController@update_hardwareline');
Route::POST('/delete_hardwareline','CatalogController@delete_hardwareline');

//catolog- action
Route::POST('/actionhead','CatalogController@select_actionhead');
Route::GET('/add_action','CatalogController@add_action');
Route::POST('/update_action','CatalogController@update_action');
Route::POST('/delete_action','CatalogController@delete_action');


Auth::routes();

