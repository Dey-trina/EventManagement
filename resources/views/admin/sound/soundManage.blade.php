@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')

<h3>Sound Manage</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')

<?php
$i=0;
?>
<div class="panel-body">

   Total Item: {{$sounds->total()}} <br>
    Item Per This Page: {{$sounds->perPage() }} <br>
    Item On This Page: {{$sounds->count() }} <br>
    Page No: {{$sounds->currentPage() }} <br>
    From Item {{$sounds->firstItem() }} To {{$sounds->lastItem() }}
    <br>
    <hr>
                            <table width="80%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                     <th>Event Type</th>
                                		<th>Sound Company Name</th>
                                		
                                		<th>Price</th>
                                        <th>Action</th>
                                	                              
                                		                              		
                                		
                                		
                                    </tr>
                                </thead>
                                <tbody>
                                	 @foreach($sounds as $sound)
                                	<tr>
                                		 <td align="center">{{ ++$i}}</td>
                                         <td align="center">{{ $sound->eventType}}</td>
                                		<td align="center">{{ $sound->soundCompanyName}}</td>
                                		
                                		<td align="center">{{ $sound->cost}}</td>
                                          <td align="center"><a href="{{ url('sound/view/'.$sound->user_id.'/'.$sound->soundCompanyName )}}" target="___blank"> View</a>|<a href="{{ url('sound/edit/'.$sound->soundCompanyName )}}" target="___blank">Edit</a>|<a href="{{url('sound/delete/'.$sound->id )}}" onclick="return confirm('Are You Want To Delete Food_Item?')"> Delete </a> </td>
                                		
                                		
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$sounds->links()}}
                        </div>
                      
@endsection
