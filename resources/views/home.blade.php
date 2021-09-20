@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Work-Shops</h3>
                </div>
                @if (session()->has('message'))
                <div class="alert alert-successs alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {!! session('error') !!}
                  </div>

                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($workshops)>0)
                        @foreach ($workshops as $workshop)
                         <div class="card">
                             <div class="card-header text-center">
                                <h4>{{$workshop->name}}</h4>
                             </div>
                            <div class="card-body">
                                <textarea name="" id="" disabled cols="30" class="form-control" rows="4">{{$workshop->description}}</textarea><br>
                                <br>
                                <p>Note: Each Workshop costs NGN 1,000 Per hour</p>
                                <a href="/book/{{$workshop->id}}" class="btn btn-primary">View Workshop</a>
                            </div>
                        </div><br>
                        @endforeach

                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
