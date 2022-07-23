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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
###########
// All index data
Route::get('/file/allfiles', 'FileController@index')->name('files.index');
// Create page
Route::get('/file/create', 'FileController@create')->name('files.create');
// store at database
Route::post('/file/save', 'FileController@store')->name('files.store');
// Edit
Route::get('/file/edit/{id}', 'FileController@edit')->name('files.edit');
// Update page
Route::get('/file/update/{id}', 'FileController@update')->name('files.update');
// Delete
Route::get('/file/delete/{id}', 'FileController@destroy')->name('files.destroy');
// show
Route::get('/file/show/{id}', 'FileController@show')->name('files.show');
// Download
Route::get('/file/download/{id}','FileController@download')->name('files.download');
