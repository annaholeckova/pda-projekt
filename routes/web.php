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

Route::get('/', 'HomeController@index');

Auth::routes();



Route::get('/agencies', 'AgencyController@index');
Route::get('/agencies/create', 'AgencyController@create');
Route::get('/agencies/{agency}', 'AgencyController@show');
Route::post('/agencies', 'AgencyController@store');
Route::delete('/agencies/{agency}', 'AgencyController@destroy');
Route::patch('/agencies/{agency}', 'AgencyController@update');

Route::get('/skills', 'SkillController@index');
Route::get('/skills/create', 'SkillController@create');
Route::get('/skills/{skill}', 'SkillController@show');
Route::post('/skills', 'SkillController@store');
Route::delete('/skills/{skill}', 'SkillController@destroy');
Route::patch('/skills/{skill}', 'SkillController@update');

Route::get('/students', 'StudentController@index');
Route::get('/students/create', 'StudentController@create');
Route::get('/students/{student}', 'StudentController@show');
Route::post('/students', 'StudentController@store');
Route::delete('/students/{student}', 'StudentController@destroy');
Route::patch('/students/{student}', 'StudentController@update');
Route::post('/students/{student}/skills', 'StudentController@addSkill');
Route::delete('/students/{student}/skills', 'StudentController@removeSkill');

Route::get('/works', 'WorkController@index');
Route::get('/works/create', 'WorkController@create');
Route::get('/works/{work}', 'WorkController@show');
Route::post('/works', 'WorkController@store');
Route::delete('/works/{work}', 'WorkController@destroy');
Route::patch('/works/{work}', 'WorkController@update');
Route::post('/works/{work}/students', 'WorkController@addStudent');
Route::delete('/works/{work}/students', 'WorkController@removeStudent');
Route::post('/works/categories', 'WorkController@addCategory');
