@extends('layouts.masterr')

@section('pageTitle')
Light Manage
@endsection

@section('contentHeading')
<hr>
<h3 style="color:green;">{{Session::get('message')}}</h3>
<h4>Food List</h4>
@endsection

@section('mainContent')

<?php
$i=0;
?>
<div class="panel-body">

   Total Item: {{$lights->total()}} <br>
    Item Per This Page: {{$lights->perPage() }} <br>
    Item On This Page: {{$lights->count() }} <br>
    Page No: {{$lights->currentPage() }} <br>
    From Item {{$lights->firstItem() }} To {{$lights->lastItem() }}
    <br>
    <hr>
     <div class="col-md-15">
    <!--<form action="/food/search" method="get">-->
         {!!Form::open(['url'=>'/light/search','method'=>'get','role'=>'form'])!!}
<div class="input-group" >
    <input type="search" name="search" class="form-control" >
    <span class="input-group-prepend" >
        <button type="submit" class="btn-btn-primary" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" >Search</button>
    </span>
</div>
   {!!Form::close() !!}
<!--</form>-->
</div>
                            <table width="80%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                     <th>Event Type</th>
                                		<th>Light Name</th>
                                		
                                		<th>Price</th>
                                	    <th>Image</th>                          
                                		                              		
                                		
                                		<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 @foreach($lights as $light)
                                	<tr>
                                		 <td align="center">{{ ++$i}}</td>
                                         <td align="center">{{ $light->eventType}}</td>
                                		<td align="center">{{ $light->lightName}}</td>
                                		
                                		<td align="center">{{ $light->cost}}</td>
                                		<td align="center"><img src=" {{ asset($light->lightImage)}}" width="100" height="80"  alt="no pic"> </td>
                                		
                                		<td align="center"><a href="{{ url('light/user_view/ ' . $light->user_id . '/' . $light->lightName )}}" target="___blank"> View</a> </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$lights->links()}}
                        </div>
                      
@endsection
