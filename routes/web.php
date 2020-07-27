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

Route::get('projects/revisions/{id}', 'ProjectController@revisions')->name('projects.revisions');

Route::patch('projects/updateMPO/{project}', 'ProjectController@updateMPO')->name('projects.updateMPO');
Route::resource('/projects', 'ProjectController');

Route::resource('/bprojects', 'BProjectController');

Route::resource('agencies', 'AgencyController');

Route::get('project-excel/{project}','ProjectController@exportExcel')->name('project.excel'); 

Route::get('projects/comments/{project}','ProjectController@comments')->name('projects.comments');

// For demo purposes
Route::get('/records', function(){
    return view('projects.records', compact('project'));

});
Route::get('/recordsAdmin', function(){
    return view('projects.recordsAdmin', compact('project'));
  
});

Route::get('/commentsAdmin', function(){
    return view('comments.admin', compact('project'));
  
});
Route::get('/commentsAgency', function(){
    return view('comments.agency', compact('project'));
  
});

Route::get('/test', function(){
    return view('projects.nonAdminView', compact('project'));
  
});

Route::get('projects/editInfo/{project}', 'ProjectController@editInfo')->name('projects.editInfo');

Route::get('users/editPassword/{user}', 'UserController@editPassword')->name('users.editPassword');

Route::delete('projects/destroyNonSubmissions/{project}', 'ProjectController@destroyNonSubmissions')->name('projects.destroyNonSubmissions');

Route::delete('projects/leaveApproved/{project}', 'ProjectController@leaveApproved')->name('projects.leaveApproved');

Route::get('projects/download/{file}', 'ProjectController@download')->name('projects.download');

// Route::get('video/videos', function(){
//     return view('video.videos');
// });
Route::get('video/videos')->name('video');