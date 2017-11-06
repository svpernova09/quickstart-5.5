@extends('layouts.app')

@section('title', 'Add Widget')

@section('content')
<form method="POST" action="/widgets" class="form-horizontal">
    {{ csrf_field() }}
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Widget</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="widget-name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="widget-name" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="widget-name" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-6">
                        <input type="text" name="description" id="widget-description" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="widget-name" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-6">
                        <input type="text" name="price" id="widget-price" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Widget
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection