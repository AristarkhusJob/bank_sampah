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

Route::get('/',function(){
    return redirect('/home');
});

Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/login', 'AuthController@postLogin')->middleware('guest');

Route::get('/home', function() {
    return redirect('/index');
})->middleware('auth')->name('home');
Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('logout');

Route::get('/index', 'IndexController@index')->middleware('auth');

Route::post('/transaction','TransactionController@index')->middleware('auth');

Route::get('/transaction/export_excel', 'TransactionController@exportExcel')->middleware('auth')->name('export-transaction');

Route::get('/transaction/filter', 'TransactionController@filter')->middleware('auth')->name('transaction.filter');

route::resource('transaction','TransactionController')->middleware('auth');

route::resource('trash','TrashController')->middleware('auth');
route::resource('user','UserController')->middleware('auth');
route::resource('update','UpdatePassController')->middleware('auth');
route::resource('notif','NotificationController')->middleware('auth');

route::resource('beasiswa','BeasiswaController')->middleware('auth');
route::resource('beswan','BeswanController')->middleware('auth');
route::resource('payment','PaymentController')->middleware('auth');

Route::get('/download/exportExcelAll', 'DownloadController@exportExcelAll')->middleware('auth')->name('exportExcelAll');
Route::get('/download/exportExcelYear', 'DownloadController@exportExcelYear')->middleware('auth')->name('exportExcelYear');
Route::get('/download/exportExcelMonthYear', 'DownloadController@exportExcelMonthYear')->middleware('auth')->name('exportExcelMonthYear');
Route::get('/download/exportExcelRange', 'DownloadController@exportExcelRange')->middleware('auth')->name('exportExcelRange');

