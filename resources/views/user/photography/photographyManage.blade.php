@extends('layouts.masterr')

@section('pageTitle')
Photography Manage
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

   Total Item: {{$photos->total()}} <br>
    Item Per This Page: {{$photos->perPage() }} <br>
    Item On This Page: {{$photos->count() }} <br>
    Page No: {{$photos->currentPage() }} <br>
    From Item {{$photos->firstItem() }} To {{$photos->lastItem() }}
    <br>
    <hr>
     <div class="col-md-15">
    <!--<form action="/food/search" method="get">-->
         {!!Form::open(['url'=>'/photography/search','method'=>'get','role'=>'form'])!!}
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
                                		<th>Photography Company Name</th>
                                		
                                		<th>Per Photo Price</th>
                                	                              
                                		                              		
                                		
                                		<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 @foreach($photos as $photo)
                                	<tr>
                                		 <td align="center">{{ ++$i}}</td>
                                         <td align="center">{{ $photo->eventType}}</td>
                                		<td align="center">{{ $photo->photographyCompanyName}}</td>
                                		
                                		<td align="center">{{ $photo->photographyCost}}</td>
                                		
                                		
                                		<td align="center"><a href="{{ url('photography/user_view/'.$photo->user_id.'/'.$photo->photographyCompanyName )}}" target="___blank"> View</a>  </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$photos->links()}}
                        </div>
  @endsection                    

