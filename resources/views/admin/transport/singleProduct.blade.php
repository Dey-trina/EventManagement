
@extends('layouts.master')

@section('pageTitle')
Vehicle Manage
@endsection
@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Vehicle Manage</h3>

@endsection

@section('mainContent')
<img src="{{asset($transport->vehicleImage)}}" width="300"> <br> <hr>
Venue Name:{{$transport->vehicleName}} <br>
Price:{{$transport->cost}} <br>
@endsection