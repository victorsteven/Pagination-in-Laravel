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
    return view('welcome');
});

Route::get('students', 'AjaxController@index');
Route::get('students/read-data', 'AjaxController@readData');

Route::post('/student/store', 'AjaxController@store');

Route::post('/student/destroy', 'AjaxController@destroy');

Route::get('/student/edit', 'AjaxController@edit');
Route::post('/student/update', 'AjaxController@update');

Route::get('/student/pagination', 'AjaxController@pagination');

Route::get('/student/page/ajax', 'AjaxController@studentPage');

Route::get('/datatable', 'DatatableController@index');

Route::get('/insert-student-validation', 'ValidationController@insertStudentValidation');

Route::post('/insert-student-validation', 'ValidationController@storeData');

// Route::get('/autocomplete', function(){
//     return view('autocomplete.index');
// });
Route::get('/autocomplete', 'AutoCompleteController@index');

Route::get('/autocomplete-search', 'AutoCompleteController@search');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
