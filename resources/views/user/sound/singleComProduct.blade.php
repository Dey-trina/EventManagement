
@extends('layouts.masterr')

@section('pageTitle')
Sound Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Sound Manage</h3>
<hr>
@endsection

@section('mainContent')

<h4>Event Type:{{$sound->eventType}} </h4>
<h4>Light Name:{{$sound->soundCompanyName}}</h4> 
<h4>Company Name:{{$sound->comName}}</h4> 
<h4>Price:{{$sound->cost}} </h4>

@endsection