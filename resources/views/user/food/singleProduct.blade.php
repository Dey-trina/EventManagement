
@extends('layouts.masterr')

@section('pageTitle')
Food Manage
@endsection

@section('contentHeading')


<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Food Manage</h3>

@endsection

@section('mainContent')
<img src="{{asset($food->foodImage)}}" width="300"> <br> <hr>
<h4>Food Type:{{$food->foodType}}</h4> 
<h4>Company Name:{{$food->comName}}</h4>
<h4>Food Name:{{$food->foodName}}</h4> 
<h4>Price:{{$food->cost}}</h4> 
<h4>Food Description:{{$food->foodDescription}} </h4>
<h4>Event Type:{{$food->eventType}}</h4>


<h4><a href="{{ url('food/com_food_manage/'. $food->user_id)}}" target="___blank">See Other Options of This Company</a> </h4>
@endsection


