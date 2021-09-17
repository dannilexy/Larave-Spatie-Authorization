@extends('layouts.app')
@section('content')
    <div class="container col-md-8 offset-2">
        <div class="card">
            <div class="card-header text-center">
                <h2>Users</h2>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    @foreach ($users as $user)
                           <tr>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>{{$user->isActive? 'Active': 'Not Active'}}</td>
                               <td><a class="btn btn-succcess" href="/user/{{$user->id}}/view">View</a></td>
                            </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
