@extends('layouts.app')

@section('title', 'Widgets Index')

@section('content')

<div class="col-md-6">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($widgets as $widget)
        <tr>
            <td>{{ $widget->name }}</td>
            <td>{{ $widget->description }}</td>
            <td>{{ $widget->price }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection