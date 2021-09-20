@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Add Opening Details</h3>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <form action="/saveOpen/{{$workshop->id}}" method="POST">
                        <div class="form-group">
                            <label for="">Opening Date:</label>
                            <input type="date" name="openingdate" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Opening Time:</label>
                            <input type="time" name="hourFrom" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Closing Time:</label>
                            <input type="time" name="hourTo" id="" class="form-control">
                        </div>
                        <input type="hidden" name="workshop_id" value="{{ $workshop->id}}">
                        {{ csrf_field() }}
                        <input type="submit" value="Add" class="btn btn-success">
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
