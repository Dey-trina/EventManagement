
@extends('layouts.master')

@section('pageTitle')
Decoration Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<hr>
Decoration Manage

@endsection

@section('mainContent')
<img src="{{asset($decoration->decorationImage)}}" width="300"> <br> <hr>
Venue Name:{{$decoration->decorationCode}} <br>
Price:{{$decoration->cost}} <br>
@endsection

