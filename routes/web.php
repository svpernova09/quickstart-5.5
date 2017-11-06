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
use App\Http\Requests\WidgetCreateRequest;

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/widgets', function () {
        $widgets = Widget::all();

        return view('widgets.index')
            ->with('widgets', $widgets);
    });

    Route::get('/widgets/add', function () {
        return view ('widgets.add');
    });

    Route::post('/widgets', function (WidgetCreateRequest $request) {
        $widget = new Widget();
        $widget->name = $request->name;
        $widget->description = $request->description;
        $widget->price = $request->price;
        $widget->save();

        return redirect()->to('/widgets');
    });
});
