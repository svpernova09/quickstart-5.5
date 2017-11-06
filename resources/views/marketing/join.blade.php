@extends('layouts.app')

@section('title', 'Join Our Marketing Email List')

@section('content')
    <form method="POST" action="/marketing/join-list" class="form-horizontal">
        {{ csrf_field() }}
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Join Our Marketing Email List</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="task-email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="email" id="marketing-email" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Join
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection