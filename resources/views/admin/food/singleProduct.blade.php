
@extends('layouts.master')

@section('pageTitle')
Food Manage
@endsection

@section('contentHeading')


<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Food Manage</h3>

@endsection

@section('mainContent')
<img src="{{asset($food->foodImage)}}" width="300"> <br> <hr>
Food Name:{{$food->foodName}} <br>
Price:{{$food->cost}} <br>
Food Description:{{$food->foodDescription}} <br>
@endsection


