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

Route::get('/', 'UserController@continue');

Route::get('/welcome', function () {
    return view('pages.welcome');
});
Route::get('/registration', function () {
    return view('pages.registration');
});
Route::post('/store', 'UserController@store');

Route::get('/login', function () {
    return view('pages.login');
});
Route::post('/projektas/public/catalog', function () {
    return view('pages.catalog');
});

Route::post('/logs', 'UserController@logs');

Route::get('/editclient', 'UserController@editclient');

Route::get('/logout', 'UserController@logout');

Route::get('/reports', function () {
    return view('pages.reports');
})->name('reports');

Route::get('/showtable', 'ReportsController@showtable');

Route::get('/catalog', function () {
    return view('pages.catalog');
});
Route::get('/book', function () {
    return view('pages.book');
});
Route::get('/bookInfo', function () {
    return view('pages.bookInfo');
});
Route::get('/ClientManagement', function () {
    return view('pages.ClientManagement');
});
Route::get('/editClient', function () {
    return view('pages.editClient');
});
Route::get('/customerReports', function () {
    return view('pages.customerReports');
});
Route::get('/customerBasket', function () {
    return view('pages.customerBasket');
});
Route::get('/UnitManagement', function () {
    return view('pages.UnitManagement');
});
