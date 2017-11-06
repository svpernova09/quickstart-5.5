@extends('layouts.app')

@section('title', 'Users Index')

@section('content')

<div class="col-md-6">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Tasks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ count($user->tasks) }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection