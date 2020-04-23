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

Route::get('/homepage','UserController@index' );

Route::any('/', function () { 
    return view('home');
});



Route::any('/register', function () {
    return view('register');
    
});

Route::get('/admin/print', function () {
    return view('print_laporan');
});


Auth::routes();

Route::get('/inbox', 'UserController@inbox');
Route::post('/inbox','UserController@store');
    

Route::get('/home', 'UserController@index')->name('home');
Route::get('/compose', 'UserController@compose');



//admin
Route::group(['prefix' => 'admin'], function () {
    
});

Route::get('/admin/login','Auth\AdminLoginController@showLoginForm') -> name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login') -> name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/mailbox','AdminController@inbox')->name('admin.inbox');
Route::get('/admin/mailbox/read/{id}','AdminController@read')->name('admin.read');

Route::get('/admin/mailbox/confirmed','AdminController@inbox_confirmed')->name('admin.inbox.confirmed');
Route::post('/admin/mailbox/confirmed','AdminController@confirmed') -> name('admin.login.confirmed');

Route::get('/admin/mailbox/delete/{id}','AdminController@delete')->name('admin.mailbox.delete');

Route::get('/admin/mailbox/compose','AdminController@compose')->name('admin.mailbox.compose');
Route::post('/admin/mailbox/compose','AdminController@send_compose') -> name('admin.login.send');
Route::get('/admin/mailbox/cetak/{id}','AdminController@print')->name('admin.mailbox.print');







