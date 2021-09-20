@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header text-center">
                <h3>Add Work-Shop</h3>
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
                <form action="/addworkshop" method="POST">
                    <div class="form-group">
                        <label for="name" class="label">Workshop Name:</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Work-Shop Name">
                    </div>


                    <div class="form-group">
                        <label for="hourTo" class="label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Work-Shop Description"></textarea>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" value="Add Workshop" class="btn btn-success">
                    <a href="/workshop" class="btn btn-primary">Back</a>
                </div>

            </form>
         </div>
    </div>

    </div>
</div>
@endsection
