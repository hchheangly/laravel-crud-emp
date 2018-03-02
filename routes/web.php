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
    return view('emp.index');
});
Route::get('/','EmployeeController@index')->name('index');
Route::get('/addEmp','EmployeeController@create')->name('addEmp');
Route::post('/store','EmployeeController@store')->name('store');
Route::get('/edit/{id}','EmployeeController@edit')->name('edit');
Route::post('/update/{id}', 'EmployeeController@update')->name('update');
Route::get('/delete/{id}', 'EmployeeController@delete')->name('delete');
Route::any('/search','EmployeeController@search')->name('search');