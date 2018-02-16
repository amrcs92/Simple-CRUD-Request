@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a href="/user/{{$request->id}}" class="btn btn-default pull-left"> << </a>
        <h1 class="text-success text-center">Edit Request</h1>
        <form class="col-md-6 col-md-offset-3" action="/user/{{$request->id}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="request_type">Request Type</label>
                <select name="request_type" id="request_type" class="form-control">
                    <option disabled>-- Select Request type --</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{ $request->request_type->name == $type->name ?'selected="selected"':''}}>{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>

@endsection