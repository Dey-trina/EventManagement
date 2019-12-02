
@extends('layouts.master')

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
	<h4>Venue Name:{{ $v->venueName }} </h4> 
	<h4>Price:{{ $v->cost }} </h4> <br>
@endif


@endforeach




@endsection


