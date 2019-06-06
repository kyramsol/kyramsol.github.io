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

Route::get('/student/{id}', 'StudentController@getStudentData');

Route::post('/student/change/{id}', 'StudentController@addStudentData');



Route::get('/diploma', 'DiplomaController@saveDiploma');

Route::get('/AddDiploma', 'DiplomaController@viewDiploma');

Route::get('/takestudents', 'DiplomaController@takeStudent');

Route::get('/takegroup', 'DiplomaController@takeGroup');

Route::get('/takedepartment', 'DiplomaController@takeDepartment');



Route::post('/AddDiploma/new','DiplomaController@saveDiploma');



Route::get('/testajax', function()
{
    $pepka='govno';
    return $pepka;
});


Route::get('/SearchResults', 'ResultController@ShowResults');



Auth::routes();

Route::get('/home', 'HomeController@index');
