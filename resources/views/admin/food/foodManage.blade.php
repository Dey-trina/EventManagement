
@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')

<h3>Food Manage</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
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
 <table width="500%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
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

         <td align="center"><a href="{{ url('food/view/' .$food->user_id . '/' .$food->foodName )}}" target="___blank"> View</a>|<a href="{{ url('food/edit/'.$food->foodName )}}" target="___blank">Edit</a>|<a href="{{url('food/delete/'.$food->id )}}" onclick="return confirm('Are You Want To Delete Food_Item?')"> Delete </a> </td>
         <!-- <?php echo $food->user_id?> -->
     </tr>
     @endforeach
 </tbody>
</table>

{{$foods->links()}}
</div>
@endsection

