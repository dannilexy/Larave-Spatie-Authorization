.@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/booknow" method="POST">
            <div class="card">
                <div class="card-header text-center">
                   <h4>{{$workshop->name}}</h4>
                </div>
               <div class="card-body">
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {!! session('error') !!}
                  </div>

                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <input type="hidden" name="workshop_id" value="{{$workshop->id}}">
                <textarea name="" id="" disabled cols="30" class="form-control" rows="4">{{$workshop->description}}</textarea><br>
                    <br>
                   <div class="row">
                       <div class="col-md-3">
                           <label for="">Opening Date And Time:</label>
                       </div>
                       <select required class="form-control" name="opening_id"  id="">
                           <option value="">--Select Date--</option>
                           @foreach ($openings as $opening)
                           <option value="{{$opening->id}}">{{$opening->openingdate}} From: {{ date('h:i A', strtotime($opening->hourFrom))}} To: {{ date('h:i A', strtotime($opening->hourTo))}} </option>
                           @endforeach
                       </select>
                   </div><br>
                    <p>Note: Each Workshop costs NGN 1,000 Per hour</p>
                   <div class="row">
                       <div class="col-md-6">
                           <div class="row">
                            <div class="col-md-3"><label for="">No of Hours:</label></div>
                            <div class="col-md-9"><input type="number" class="form-control" name="noOfHours" min="1" id="nhours"></div>

                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                             <div class="col-md-3"><label for="">From:</label></div>
                             <div class="col-md-9"><input type="time" class="form-control" name="startTime"  id=""></div>

                            </div>
                         </div><br>

                         <input type="hidden" name="workshopId" value="{{$workshop->id}}">
                         {{ csrf_field() }}
                   </div><br>
                   <button type="submit" class="btn btn-success">Book Now</button>
                   <a href="/home" class="btn btn-primary">Back</a>
               </div>
           </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $("#nhours").clicked(function(){
               alert('changed');
            });
        });
    </script>
@endsection
