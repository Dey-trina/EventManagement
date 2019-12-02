@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')

<h3>Lighting Manage</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
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
                                		
                                		<td align="center"><a href="{{ url('light/view/ ' . $light->user_id . '/' . $light->lightName )}}" target="___blank"> View</a>|<a href="{{ url('light/edit/'.$light->lightName )}}" target="___blank">Edit</a>|<a href="{{url('light/delete/'.$light->id )}}" onclick="return confirm('Are You Want To Delete Food_Item?')"> Delete </a> </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$lights->links()}}
                        </div>
       @endsection               

