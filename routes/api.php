<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Task;
use App\Widget;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/widgets', function (Request $request) {
    return Widget::all();
});

Route::get('/widgets/{id}', function (Request $request) {
    return Widget::findorFail($request->id);
});

Route::get('/tasks', function (Request $request) {
    return Task::with('user')->get();
});

Route::get('/tasks/{id}', function (Request $request) {
    return Task::with('user')->findorFail($request->id);
});

