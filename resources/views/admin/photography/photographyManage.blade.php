@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')

<h3>Photography Manage</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
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
                                		
                                		
                                		<td align="center"><a href="{{ url('photography/view/'.$photo->user_id.'/'.$photo->photographyCompanyName )}}" target="___blank"> View</a>|<a href="{{ url('photo/edit/'.$photo->photographyCompanyName )}}" target="___blank">Edit</a>  </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$photos->links()}}
                        </div>
   @endsection                   

