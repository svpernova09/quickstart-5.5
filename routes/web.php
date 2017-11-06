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
use App\Widget;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/widgets', function () {
    $widgets = Widget::all();

    return view('widgets.index')
        ->with('widgets', $widgets);
});