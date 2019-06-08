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




Route::get('/AddDiploma', 'DiplomaController@viewDiploma');

Route::post('/AddDiploma/new','DiplomaController@saveDiploma');

Route::get('/AddDiploma/change/{id}', 'DiplomaController@viewDiplomaToEdit');

Route::post('/AddDiploma/edit/{id}','DiplomaController@editDiploma');

Route::get('/Diploma/{id}','DiplomaController@Diploma');

Route::get('/Diploma/download/{id}', 'DiplomaController@DownloadDiploma');




Route::get('/takestudents', 'StudentController@takeStudent');

Route::get('/takegroup', 'GroupController@takeGroup');

Route::get('/takedepartment', 'DepartmentsController@takeDepartment');




Route::post('/Search', 'ResultController@Search');

Route::get('/StudentList', 'ResultController@ShowStudentsResults');

Route::get('/SearchResults', 'ResultController@ShowResults');




Auth::routes();

Route::get('/home', 'HomeController@index');
