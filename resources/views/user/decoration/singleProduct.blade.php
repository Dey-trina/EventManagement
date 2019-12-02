
@extends('layouts.masterr')

@section('pageTitle')
Decoration Manage
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Decoration Manage</h3>

@endsection

@section('mainContent')
<img src="{{asset($decoration->decorationImage)}}" width="300"> <br> <hr>
<h4>Event Type:{{$decoration->eventType}} </h4>
<h4>Company Name:{{$decoration->comName}}</h4>
<h4>Venue Name:{{$decoration->decorationCode}}</h4> 
<h4>Price:{{$decoration->cost}}</h4> 
<h4>Decoration Type:{{$decoration->decorationType}} </h4>
<!-- <div class="col-md-15">
 	<!--<form action="/food/search" method="get">-->
 		 <!--{!!Form::open(['url'=>'/decoration/com_decoration_manage.$decoration->user_id','method'=>'get','role'=>'form'])!!}
<button type="submit" class="btn-btn-primary" style="color: #fff;
    background-color: red;
    border-color: black;
" >See other Options of this Company</button>
 {!!Form::close() !!}-->
<!--</form>-->

<h4><a href="{{ url('decoration/com_decoration_manage/'. $decoration->user_id)}}" target="___blank">See Other Options of This Company</a> </h4>
</div>
@endsection

