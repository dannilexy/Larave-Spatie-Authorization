@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header text-center">
                <h3>Edit Work-Shop</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
                <form action="/updateworkshop/{{$work->id}}" method="POST">
                    <div class="form-group">
                        <label for="name" class="label">Workshop Name:</label>
                        <input type="text" value="{{$work->name}}" name="name" id="" class="form-control" placeholder="Work-Shop Name">
                    </div>
                    <div class="form-group">
                        <label for="dateOpen" class="label">Date Open:</label>
                        <input type="date" value="{{$work->dateOpen}}" name="dateOpen" id="" class="form-control" placeholder="Date Open">
                    </div>
                    <div class="form-group">
                        <label for="hourFrom" class="label">Hour From:</label>
                        <input type="time" value="{{$work->hourFrom}}" name="hourFrom" id="" class="form-control" placeholder="Hour From">
                    </div>
                    <div class="form-group">
                        <label for="hourTo" class="label">Hour To:</label>
                        <input type="time" name="hourTo" value="{{$work->hourTo}}" id="" class="form-control" placeholder="Hour From">
                    </div>
                    <input type="hidden" name="id" value="{{$work->id}}" >
                    {{ csrf_field() }}
                    <input type="submit" value="Update Workshop" class="btn btn-success">
                    <a href="/workshop" class="btn btn-primary">Back</a>
                </div>

            </form>
         </div>
    </div>

    </div>
</div>
@endsection
