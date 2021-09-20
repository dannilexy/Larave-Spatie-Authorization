@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>{{$workshop->name}}</h3>
                <a href="/addopening/{{$workshop->id}}" class="btn btn-default float-right">Add-Opening Days</a>
            </div>
            <div class="card-body">
                <label for="">Description:</label>
                <textarea name="" disabled id="" cols="30" class="form-control" rows="4">
                    {{$workshop->description}}
                </textarea>
                <br>
                <label for="">Opening Dates:</label>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center">S/N</th>
                            <th class="text-center">Opening Date</th>
                            <th class="text-center">Opening Time</th>
                            <th class="text-center">Closing Time</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($openings) > 0)
                            @foreach ($openings as  $opening)
                            <tr>
                                <td class="text-center">{{$opening->id}}</td>
                                <td class="text-center">{{$opening->openingdate}}</td>
                                <td class="text-center">{{$opening->hourFrom}}</td>
                                <td class="text-center">{{$opening->hourTo}}</td>
                                 <td class="text-center">
                                    <a href="/deleteopening/{{$opening->id}}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                            @endforeach

                        @endif


                    </tbody>
                </table>
            </div>



        </div>
    </div>
@endsection
