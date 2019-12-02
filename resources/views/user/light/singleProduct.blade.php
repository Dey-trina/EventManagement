
@extends('layouts.masterr')

@section('pageTitle')
Lighting Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Lighting Manage</h3>

@endsection

@section('mainContent')
<img src="{{asset($light->lightImage)}}" width="300"> <br> <hr>
<h4>Event Type:{{$light->eventType}} </h4>
<h4>Light Name:{{$light->lightName}}</h4> 
<h4>Company Name:{{$light->comName}}</h4> 
<h4>Price:{{$light->cost}} </h4>
<h4><a href="{{ url('light/com_light_manage/'. $light->user_id)}}" target="___blank">See Other Options of This Company</a> </h4>
@endsection