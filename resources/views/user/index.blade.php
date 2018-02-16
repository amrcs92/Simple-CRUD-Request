@extends('layouts.app')
<style>
    tr.table-tr:hover{
        cursor:pointer;
        color: #3af;
        text-decoration: underline;
    }
</style>
@section('content')
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<div class="container">
    <div class="row">
        <a href="/user/create" class="btn btn-primary pull-right">Create</a>
        <h1>Your Requests</h1>
        @if(count($requests) >= 1)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Request Type</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach($requests as $request)                    
                        <tr class="table-tr" data-url="/user/{{$request->id}}">
                            <td>{{ $index++ }}</td>
                            <td>{{ $request->request_type->name }}</td>
                            <td>{{ $request->status }}</td>
                            <td>
                                <form action="/user/{{$request->id}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-danger">No requests found</p>
        @endif
    </div>
</div>
<script>
    $(function() {
        $('table.table').on("click", "tr.table-tr", function() {
            window.location = $(this).data("url");
        });
    });
</script>
@endsection