
@extends('layouts.masterr')

@section('pageTitle')
Decoration Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Decoration Manage</h3>

@endsection

@section('mainContent')
<img src="{{asset($decoration->decorationImage)}}" width="300"> <br> <hr>
<h4>Event Type:{{$decoration->eventType}} </h4>
<h4>Company Name:{{$decoration->comName}}</h4>
<h4>Venue Name:{{$decoration->decorationCode}}</h4> 
<h4>Price:{{$decoration->cost}}</h4> 
<h4>Decoration Type:{{$decoration->decorationType}} </h4>

@endsection

