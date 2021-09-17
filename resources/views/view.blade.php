@extends('layouts.app')
@section('content')
    <div class="container col-md-8 offset-2">
        <div class="card">
            <div class="card-header text-center">
                <h2>User Details</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('activate')}}">
                    <div class="form-group">
                        <label class="control-label">Name:</label>
                        <input type="text" disabled name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email:</label>
                        <input type="text" disabled name="email" class="form-control" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status:</label>
                        <input type="text" disabled name="isActive" class="form-control" value="{{$user->isActive? 'Active': 'Not Active'}}">
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">

                    @if ($user->isActive)
                    <button class="btn btn-warning" disabled >De-Activate</button>

                    @else
                    <button type="submit" class="btn btn-warning btn-disabled">Activate</button>
                    @endif
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection
