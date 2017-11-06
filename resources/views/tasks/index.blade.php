@extends('layouts.app')

@section('title', 'Tasks Index')

@section('content')

<div class="col-md-6">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection