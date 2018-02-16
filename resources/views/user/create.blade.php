@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-success text-center">Create Request</h1>
        <form class="col-md-6 col-md-offset-3" action="/user" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="request_type">Request Type</label>
                <select name="request_type" id="request_type" class="form-control">
                    <option disabled selected>-- Select Request type --</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection