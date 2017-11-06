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
use App\Jobs\RunUsersActivityReport;

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/marketing/join-list', 'MarketingEmailController@showJoin');
Route::post('/marketing/join-list', 'MarketingEmailController@doJoin');
Route::get('/marketing/pending', 'MarketingEmailController@showPending')->name('show-pending');
Route::get('/marketing/verify-email/{hash}', 'MarketingEmailController@validateEmailHash');

Route::get('/run-user-report', function () {
    RunUsersActivityReport::dispatch();
    return redirect('/');
});

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('widgets', 'WidgetController@index')->name('widgets.index');
    Route::get('widgets/add', 'WidgetController@add')->name('widgets.add');
    Route::post('widgets', 'WidgetController@create')->name('widgets.create');
    Route::get('tasks', 'TaskController@index')->name('tasks.index');
    Route::get('tasks/add', 'TaskController@add')->name('tasks.add');
    Route::post('tasks', 'TaskController@create')->name('tasks.create');
    Route::get('/users', function () {
        $users = \App\User::with('tasks')->get();
        return view('users.index')
            ->with('users', $users);
    });
});
