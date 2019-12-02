
@extends('layouts.masterr')

@section('pageTitle')
Photography Manage
@endsection


@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Photography Manage</h3>
@endsection

@section('mainContent')
@foreach($photos as $p)

<img src="{{ URL::asset($p->photographyDemo) }}" width="200"> <br> <hr>

@if($loop->last)
<h4>Event Type:{{ $p->eventType }} </h4> 
<h4>Company Name:{{ $p->comName }} </h4> 
<h4>Photography Company Name:{{ $p->photographyCompanyName }} </h4> 
<h4>Price:{{$p->photographyCost}}</h4> <br>
@endif
@endforeach
@endsection
 









