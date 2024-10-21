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
Route::post('/checkusername', 'EmployeeController@checkusername');
Route::any('sendemail', 'JobFileController@sendemail');

/* DataTables */
Route::any('jobfilelist', 'JobFileController@qa1m_jobfileList')->name('qa1m.jobfile.list');

/* Admin */
Route::group(['middleware' => '\App\Http\Middleware\AdminMiddleware', 'prefix' => 'admin'], function() {
    /* Dashboard */
    Route::get('/dashboard', 'HomeController@admin_dashboard');

    /* Users */
    Route::get('/users', 'EmployeeController@admin_users')->name('admin.users');
    Route::post('/user/store', 'EmployeeController@admin_userstore')->name('admin.user.store');
    Route::get('/user/edit/{id}', 'EmployeeController@admin_useredit')->name('admin.user.edit');
    Route::post('user/update/{id}', 'EmployeeController@admin_userupdate')->name('admin.user.update');
    Route::delete('user/delete/{id}', 'EmployeeController@admin_deleteuser');

    /* Reports */
    Route::get('/accounting-reports', 'ReportController@admin_report')->name('admin.reports');
    Route::get('/general-reports', 'ReportController@admin_report2')->name('admin.reports2');
    Route::get('/logs', 'ReportController@admin_logs')->name('admin.logs');
    Route::any('reportlist', 'JobFileController@reportlist')->name('jobfile.reportlist');
    
});