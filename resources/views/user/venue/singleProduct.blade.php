
@extends('layouts.masterr')

@section('pageTitle')
Venue Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Venue Manage</h3>

@endsection

@section('mainContent')


@foreach($venues as $v)

<img src="{{ URL::asset($v->image) }}" width="200"> <br> <hr>

@if($loop->last)
	<h4>Event Type:{{ $v->eventType }} </h4> 
	<h4>Company Name:{{ $v->comName }} </h4> 
	<h4>Venue Name:{{ $v->venueName }} </h4> 
	<h4>Price:{{ $v->cost }} </h4> <br>
	<h4><a href="{{ url('venue/com_venue_manage/'. $v->user_id)}}" target="___blank">See Other Options of This Company</a> </h4>
@endif


@endforeach




@endsection


