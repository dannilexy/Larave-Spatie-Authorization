@extends('layouts.app')
@section('content')
<div class="container">
    <a href="/createworkshop" class="btn btn-default btn-lg">Create Workshop</a>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {!! session('message') !!}
      </div>

    @endif
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th class="text-center">S/N</th>
                <th class="text-center">Name</th>
                <th class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>
            @if(count($workshops) > 0)
                @foreach ($workshops as  $workshop)
                <tr>
                    <td class="text-center">{{$workshop->id}}</td>
                    <td class="text-center">{{$workshop->name}}</td>
                     <td class="text-center">
                        <a href="/showworkshop/{{$workshop->id}}" class="btn btn-primary"><i class="fa fa-edit"> </i> View</a>
                        <a href="/deleteworkshop/{{$workshop->id}}" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                @endforeach
            @else
                <h3>No Work-shop To Display</h3>
            @endif


        </tbody>
    </table>

    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
    } );
   </script>

</div>

@endsection
