<?php

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


Auth::routes();
Route::group(['prefix' => LaravelLocalization::setLocale(),

    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


});

Route::get('/', function () {
    return view('home');
});
/** General pages */
Route::get('/contacts', 'GeneralController@contacts')->name('General.contacts');
Route::get('/about_coach', 'GeneralController@about_coach')->name('General.about_coach');
Route::post('/contact_us', 'GeneralController@contact_us')->name('General.contact_us');

/** User */
Route::get('/sign_in', 'UserController@sign_in')->name('User.sign_in');
Route::post('/logged', 'UserController@logged')->name('User.logged');
Route::get('/myProfile', 'UserController@myProfile')->name('User.myProfile');
Route::get('/sign_up', 'UserController@sign_up')->name('User.sign_up');
Route::post('/saveUser', 'UserController@saveUser')->name('User.saveUser');

/** Packages */
Route::get('/Packages', 'PackagesController@allPackages')->name('Packages.allPackages');
Route::get('/singlePackage{id}', 'PackagesController@singlePackage')->name('Packages.singlePackage');
