<?php

namespace App\Http\Controllers;

use App\Http\Requests\WidgetCreateRequest;
use App\Widget;

class WidgetController extends Controller
{
    public function index()
    {
        $widgets = Widget::all();

        return view('widgets.index')
            ->with('widgets', $widgets);
    }

    public function add()
    {
        return view('widgets.add');
    }

    public function create(WidgetCreateRequest $request)
    {
        $widget = new Widget();
        $widget->name = $request->name;
        $widget->description = $request->description;
        $widget->price = $request->price;
        $widget->save();

        return redirect()->route('widgets.index');
    }
}
