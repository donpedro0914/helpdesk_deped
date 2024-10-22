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
Route::post('/checkissue', 'IssuesController@checkissue');
Route::any('sendemail', 'JobFileController@sendemail');

/* DataTables */
Route::any('jobfilelist', 'JobFileController@qa1m_jobfileList')->name('qa1m.jobfile.list');

/* Admin */
Route::group(['middleware' => '\App\Http\Middleware\AdminMiddleware', 'prefix' => 'admin'], function() {
    /* Dashboard */
    Route::get('/dashboard', 'HomeController@admin_dashboard');

    /* Users */
    Route::get('/users', 'UserController@user')->name('admin.user');
    Route::post('/user/store', 'UserController@user_store')->name('admin.user.store');
    Route::get('/user/edit/{id}', 'UserController@user_edit')->name('admin.user.edit');
    Route::post('user/update/{id}', 'UserController@user_update')->name('admin.user.update');
    Route::delete('user/delete/{id}', 'UserController@user_delete');

    /* Issue Type */
    Route::get('issue/type', 'IssuesController@index')->name('admin.issue');
    Route::post('/issue/store', 'IssuesController@store')->name('admin.issue.store');
    Route::get('/issue/edit/{id}', 'IssuesController@edit')->name('admin.issue.edit');
    Route::post('issue/update/{id}', 'IssuesController@update')->name('admin.issue.update');

    /* Reports */
    Route::get('/accounting-reports', 'ReportController@admin_report')->name('admin.reports');
    Route::get('/general-reports', 'ReportController@admin_report2')->name('admin.reports2');
    Route::get('/logs', 'ReportController@admin_logs')->name('admin.logs');
    Route::any('reportlist', 'JobFileController@reportlist')->name('jobfile.reportlist');
    
});


/* Tickets */
Route::get('/tickets', 'TicketsController@index')->name('tickets');
Route::get('/ticket/create', 'TicketsController@create')->name('create.ticket');
Route::post('/ticket/store', 'TicketsController@store')->name('store.ticket');
Route::get('ticket/{slug}', 'TicketsController@view')->name('view.ticket');