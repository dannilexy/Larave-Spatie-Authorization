@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h3>User Bookings</h3>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> {!! session('message') !!}
                  </div>

                @endif
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center">S/N</th>
                            <th class="text-center">Workshop</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">No Of Hours</th>
                            <th class="text-center">Hour From</th>
                            <th class="text-center">Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($bookings) > 0)
                            @foreach ($bookings as  $booking)
                            <tr>
                                <td class="text-center">{{$booking->id}}</td>
                                <td class="text-center">{{$booking->Opening->Workshop->name}}</td>
                                <td class="text-center">{{$booking->Opening->openingdate}}</td>
                                <td class="text-center">{{$booking->noOfHours}}</td>
                                <td class="text-center">{{ date('h:i A', strtotime($booking->startTime))}}</td>
                                <td class="text-center">{{$booking->noOfHours * 1000}}</td>
                                 {{--  <td class="text-center">
                                    <a href="/showworkshop/{{$booking->id}}" class="btn btn-primary"><i class="fa fa-edit"> </i> View</a>
                                    <a href="/deleteworkshop/{{$booking->id}}" class="btn btn-danger">Delete</a>
                                </td>  --}}

                            </tr>
                            @endforeach
                        @else
                            <h3>No Work-shop To Display</h3>
                        @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
