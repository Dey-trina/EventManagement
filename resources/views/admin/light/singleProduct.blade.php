
@extends('layouts.master')

@section('pageTitle')
Lighting Manage

@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Lighting Manage</h3>

@endsection

@section('mainContent')
<img src="{{asset($light->lightImage)}}" width="300"> <br> <hr>
Venue Name:{{$light->lightName}} <br>
Price:{{$light->cost}} <br>
@endsection