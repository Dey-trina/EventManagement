
@extends('layouts.masterr')

@section('pageTitle')
Vehicle Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Vehicle Manage</h3>

@endsection


@section('mainContent')
<img src="{{asset($transport->vehicleImage)}}" width="300"> <br> <hr>
<h4>Event Type:{{$transport->eventType}}</h4> 
<h4>Company Name:{{$transport->comName}}</h4>
<h4>Vehicle Name:{{$transport->vehicleName}}</h4> 
<h4>Price:{{$transport->cost}} </h4> 
@endsection