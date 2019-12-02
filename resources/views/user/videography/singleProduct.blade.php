
@extends('layouts.masterr')

@section('pageTitle')
Video Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Videography Manage</h3>

@endsection

@section('mainContent')


<video width="320" height="240" controls> 
	<source src="{{ asset($video->videographyDemo) }}" type="video/mp4" >
		can't play video
</video>
<!-- <video width="320" height="240" controls> 
	<source src="{{ asset('videography/sample.mp4') }}" type="video/mp4" >
		can't play video
</video> -->
 <br> 
<hr>
<h4>Event Type:{{$video->eventType}} </h4>
<h4>Company Name:{{$video->comName}}</h4>
<h4>Videography Company Name:{{$video->videographyCompanyName}} </h4>
<h4>Price:{{$video->videographyCost}} </h4>
<h4><a href="{{ url('videography/com_videography_manage/'.$video->user_id)}}" target="___blank">See Other Options of This Company</a> </h4>
<!--<?php  $video->videographyDemo?>-->
@endsection