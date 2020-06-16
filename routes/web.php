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
    return view('welcome');

});


Route::get('/upload', 'CsvController@upload')->middleware('admin');
Route::post('/store-csv', 'CsvController@storeCsv')->name('store-csv')->middleware('admin');


Route::get('/access-error', 'HomeController@accessError');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
