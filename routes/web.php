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
 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//the middleware route line is used to check for authenticated users before allowing user to view  them
Route::middleware(['auth'])->group(function(){

    // Resource Routes for controllers
    Route::resource('companies', 'CompaniesController');
    Route::resource('projects', 'ProjectsController');
    Route::get('/projects/create/{company_id?}','ProjectsController@create');
    Route::resource('tasks', 'TasksController');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('comments', 'CommentsController');

});