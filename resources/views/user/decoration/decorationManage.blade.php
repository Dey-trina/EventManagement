@extends('layouts.masterr')

@section('pageTitle')
Food Manage
@endsection

@section('contentHeading')
<hr>
<h3 style="color:green;">{{Session::get('message')}}</h3>
<h3>Designs</h3>
@endsection

@section('mainContent')
<?php
$i=0;
?>
<div class="panel-body">

   <!--Total Item: {{$decorations->total()}} <br>
    Item Per This Page: {{$decorations->perPage() }} <br>
    Item On This Page: {{$decorations->count() }} <br>
    Page No: {{$decorations->currentPage() }} <br>
    From Item {{$decorations->firstItem() }} To {{$decorations->lastItem() }}
    <br>
    <hr>-->
     <div class="col-md-15">
 	<!--<form action="/food/search" method="get">-->
 		 {!!Form::open(['url'=>'/decoration/search','method'=>'get','role'=>'form'])!!}
<div class="input-group" >
	<input type="search" name="search" class="form-control" >
	<span class="input-group-prepend" >
		<button type="submit" class="btn-btn-primary" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" align="center">Search</button>
	</span>
</div>
   {!!Form::close() !!}
<!--</form>-->
</div>
<br>
                            <table width="100%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>SI.</th>

                                     <th>Event Type</th>
                                		<th>Decoration Code</th>
                                		
                                		<th>Price</th>
                                	    <th>Image</th>                          
                                		 <th>Decoration Type</th>                              		
                                		
                                		<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 @foreach($decorations as $decoration)
                                	<tr>
                                		 <td align="center">{{ ++$i}}</td>
                                         <td align="center">{{ $decoration->eventType}}</td>
                                		<td align="center">{{ $decoration->decorationCode}}</td>
                                		
                                		<td align="center">{{ $decoration->cost}}</td>
                                		<td align="center"><img src=" {{ asset($decoration->decorationImage)}}" width="100" height="80"  alt="no pic"> </td>
                                		<td align="center">{{ $decoration->decorationType}}</td>
                                		<td align="center"><a href="{{ url('decoration/user_view/'. $decoration->user_id.'/'.$decoration->decorationCode )}}" target="___blank"> View</a> </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$decorations->links()}}
                        </div>
 @endsection                     

