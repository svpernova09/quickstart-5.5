@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form method="POST" action="/tasks" class="form-horizontal">
        {{ csrf_field() }}
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Task</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-user_id" style="float:left;padding: 6px 6px 2px 35px;">Assign to User</label>

                        <div class="col-sm-6">
                            <select name="user_id" id="task-user_id" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection