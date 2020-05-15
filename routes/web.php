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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController');

Route::resource('agencies', 'AgencyController');

Route::patch('projects/updateMPO/{project}', 'ProjectController@updateMPO')->name('projects.updateMPO');
Route::get('projects/logChanges', 'ProjectController@logChanges')->name('projects.logChanges');


Route::resource('projects', 'ProjectController');
// Route::apiResource('api/projects', 'API\ProjectController');

Route::resource('agencies', 'AgencyController');

Route::get('project-pdf','ProjectController@exportPDF')->name('project.pdf'); 
Route::get('project-excel','ProjectController@exportExcel')->name('project.excel'); 