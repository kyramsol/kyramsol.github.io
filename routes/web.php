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

Route::get('/Search', function () {
    return view('MainPage');
});
Route::get('/student', 'StudentController@addStudentForm');

Route::post('/student/new', 'StudentController@addStudent');


Route::get('/AddDiploma', function () {
    return view('AddDiploma');
});
Route::get('/SearchResults', 'ResultController@ShowResults');

Auth::routes();

Route::get('/home', 'HomeController@index');
