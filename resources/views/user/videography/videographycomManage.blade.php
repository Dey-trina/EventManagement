@extends('layouts.masterr')

@section('pageTitle')
Videography Manage
@endsection

@section('contentHeading')
<hr>
<h3 style="color:green;">{{Session::get('message')}}</h3>
<h4>Videography List</h4>
@endsection

@section('mainContent')

<?php
$i=0;
?>
<div class="panel-body">

   Total Item: {{$videos->total()}} <br>
    Item Per This Page: {{$videos->perPage() }} <br>
    Item On This Page: {{$videos->count() }} <br>
    Page No: {{$videos->currentPage() }} <br>
    From Item {{$videos->firstItem() }} To {{$videos->lastItem() }}
    <br>
    <hr>

                            <table width="80%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                        <th>Event Type</th>
                                		<th>Videography Company Name</th>
                                		
                                		<th>Per Video Price</th>
                                	                              
                                		                              		
                                		
                                		<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 @foreach($videos as $video)
                                	<tr>
                                		 <td align="center">{{ ++$i}}</td>
                                         <td align="center">{{ $video->eventType}}</td>
                                		<td align="center">{{ $video->videographyCompanyName}}</td>
                                		
                                		<td align="center">{{ $video->videographyCost}}</td>
                                		
                                		
                                		<td align="center"><a href="{{ url('videography/com_view/' .$video->user_id.'/'.$video->videographyCompanyName )}}" target="___blank"> View</a> </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                         {{$videos->links()}}
                        </div>
 @endsection                     