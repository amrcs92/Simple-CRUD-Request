@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a href="/user" class="btn btn-default"> << </a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">Request Type</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>{{ $request->request_type->name }}</td>
                    <td>{{ $request->status }}</td>
                    <td>
                        <div class="col-md-6 col-md-offset-4">
                            <a href="/user/{{$request->id}}/edit" class="btn btn-warning col-md-3">Edit</a>
                            <form action="/user/$request->id" method="post" class="col-md-3">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>    
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection