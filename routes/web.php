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
use App\Task;
use App\User;
use App\Widget;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\WidgetCreateRequest;

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('widgets', 'WidgetController@index')->name('widgets.index');
    Route::get('widgets/add', 'WidgetController@add')->name('widgets.add');
    Route::post('widgets', 'WidgetController@create')->name('widgets.create');

    Route::get('/tasks', function () {
        $tasks = Task::all();

        return view('tasks.index')
            ->with('tasks', $tasks);
    });

    Route::get('/tasks/add', function () {
        $users = User::all();

        return view('tasks.add')
            ->with('users', $users);
    });

    Route::post('/tasks', function (TaskCreateRequest $request) {
        $task = new Task();
        $task->name = $request->name;
        $task->user_id = $request->user_id;
        $task->save();

        return redirect()->to('/tasks');
    });
});
