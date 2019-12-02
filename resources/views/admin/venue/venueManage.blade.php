@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')

<h3>Venue Manage</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')


<?php
$i=0;
?>
<div class="panel-body">

 Total Item: {{$venues->total()}} <br>
 Item Per This Page: {{$venues->perPage() }} <br>
 Item On This Page: {{$venues->count() }} <br>
 Page No: {{$venues->currentPage() }} <br>
 From Item {{$venues->firstItem() }} To {{$venues->lastItem() }}
 <br>
 <hr>
 <table width="500%" height="500%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
    <thead>
        <tr>
            <th>SI.</th>
            <th>Event Type</th>
            <th>Venue Name</th>

            <th>Price</th>



            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($venues as $venue)
      <tr>
         <td align="center">{{ ++$i}}</td>
         <td align="center">{{ $venue->eventType}}</td>
         <td align="center">{{ $venue->venueName}}</td>

         <td align="center">{{ $venue->cost}}</td>


         <td align="center"><a href="{{ url('venue/view/'.$venue->user_id .'/'.$venue->venueName)}}" target="___blank"> View</a>|<a href="{{ url('venue/edit/'.$venue->venueName )}}" target="___blank">Edit</a> </td>
         
     </tr>
     @endforeach
 </tbody>
</table>

{{$venues->links()}}
</div>
@endsection

