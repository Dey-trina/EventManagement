
@extends('layouts.master')

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
Venue Name:{{$video->videographyCompanyName}} <br>
Price:{{$video->videographyCost}} <br>
<!--<?php  $video->videographyDemo?>-->
@endsection