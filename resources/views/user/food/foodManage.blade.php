@extends('layouts.masterr')

@section('pageTitle')
Food Manage
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

 Total Item: {{$foods->total()}} <br>
 Item Per This Page: {{$foods->perPage() }} <br>
 Item On This Page: {{$foods->count() }} <br>
 Page No: {{$foods->currentPage() }} <br>
 From Item {{$foods->firstItem() }} To {{$foods->lastItem() }}
 <br>
 <hr>
 <div class="col-md-15" width="100%">
 	<!--<form action="/food/search" method="get">-->
 		 {!!Form::open(['url'=>'/food/search','method'=>'get','role'=>'form'])!!}
<div class="input-group" align="right">
	<input type="search" name="search" class="form-control" width="100%" align="right">
	<span class="input-group-prepend" width="50%" align="right">
		<button type="submit" class="btn-btn-primary" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" width="100%" align="center">Search</button>
	</span>
</div>
   {!!Form::close() !!}
<!--</form>-->
</div>

 <table width="100%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
    <thead>
        <tr>
            <th>SI.</th>
            <th>Event Type</th>
            <th>Food Name</th>

            <th>Price</th>
            <th>Image</th>
            <th>Food Type</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach($foods as $food)
      <tr>
         <td align="center">{{ ++$i}}</td>
         <td align="center">{{ $food->eventType}}</td>
        
         <td align="center">{{ $food->foodName}}</td>

         <td align="center">{{ $food->cost}}</td>
         <td align="center"><img src=" {{ asset($food->foodImage)}}" width="100" height="80"  alt="no pic"> </td>
         <td align="center">{{ $food->foodType}}</td>

         <td align="center"><a href="{{ url('food/user_view/'.$food->user_id .'/'.$food->foodName )}}" target="___blank"> View</a> </td>
         <!-- <?php echo $food->user_id?> -->
     </tr>
     @endforeach
 </tbody>
</table>

{{$foods->links()}}
</div>

@endsection
