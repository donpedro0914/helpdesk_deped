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

Route::get('/', function(){
    return redirect(route('login'));
});

Auth::routes();

Route::get('/logout', 'HomeController@logout');
Route::post('/checkusername', 'UserController@checkusername');
Route::post('/checkemail', 'UserController@checkemail');
Route::post('/checkissue', 'IssuesController@checkissue');
Route::any('sendemail', 'JobFileController@sendemail');
Route::get('/search', 'HomeController@search')->name('search');

/* DataTables */
Route::any('jobfilelist', 'JobFileController@qa1m_jobfileList')->name('qa1m.jobfile.list');

/* Dashboard */
Route::get('/dashboard', 'HomeController@dashboard');

/* Users */
Route::get('/users', 'UserController@user')->name('user');
Route::post('/user/store', 'UserController@user_store')->name('user.store');
Route::get('/user/edit/{id}', 'UserController@user_edit')->name('user.edit');
Route::post('user/update/{id}', 'UserController@user_update')->name('user.update');
Route::delete('user/delete/{id}', 'UserController@user_delete');

/* Issue Type */
Route::get('issue/type', 'IssuesController@index')->name('issue');
Route::post('/issue/store', 'IssuesController@store')->name('issue.store');
Route::get('/issue/edit/{id}', 'IssuesController@edit')->name('issue.edit');
Route::post('issue/update/{id}', 'IssuesController@update')->name('issue.update');

/* Reports */
Route::get('/accounting-reports', 'ReportController@admin_report')->name('reports');
Route::get('/general-reports', 'ReportController@admin_report2')->name('reports2');
Route::get('/logs', 'ReportController@admin_logs')->name('logs');
Route::any('reportlist', 'JobFileController@reportlist')->name('jobfile.reportlist');


/* Tickets */
Route::get('/tickets', 'TicketsController@index')->name('tickets');
Route::get('/ticket/create', 'TicketsController@create')->name('create.ticket');
Route::post('/ticket/store', 'TicketsController@store')->name('store.ticket');
Route::get('ticket/{slug}', 'TicketsController@view')->name('view.ticket');
Route::get('/download/{filename}/{slug}', 'TicketsController@download')->name('download');
Route::post('/ticket/update/{slug}', 'TicketsController@update')->name('update.ticket');
Route::post('deletecomment/{slug}', 'TicketsController@deletecomment');
Route::post('assign_agent/{slug}', 'TicketsController@assign_agent');