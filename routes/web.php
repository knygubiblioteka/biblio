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

Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('/registration', function () {
    return view('pages.registration');
});
Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/reports', function () {
    return view('pages.reports');
})->name('reports');
Route::get('/catalog', function () {
    return view('pages.catalog');
});
Route::get('/book', function () {
    return view('pages.book');
});
Route::get('/bookInfo', function () {
    return view('pages.bookInfo');
});