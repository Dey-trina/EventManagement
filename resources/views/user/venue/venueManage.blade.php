@extends('layouts.masterr')

@section('pageTitle')
Venue Manage
@endsection

@section('contentHeading')
<hr>
<h3 style="color:green;">{{Session::get('message')}}</h3>
<h4>Venue List</h4>
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
  <div class="col-md-15">
    <!--<form action="/food/search" method="get">-->
         {!!Form::open(['url'=>'/venue/search','method'=>'get','role'=>'form'])!!}
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


         <td align="center"><a href="{{ url('venue/user_view/'.$venue->user_id.'/'.$venue->venueName)}}" target="___blank"> View</a> </td>
         <!-- <?php echo $venue->user_id?> -->
     </tr>
     @endforeach
 </tbody>
</table>

{{$venues->links()}}
</div>
@endsection

