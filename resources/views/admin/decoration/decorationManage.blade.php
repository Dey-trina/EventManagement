
<!--<a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Go Back</a>-->

<h4 align="left"><!--<a href="{{url()->previous()}}" class="btn-btn-primary" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
">--><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3 style="color:green;">{{Session::get('message')}}</h3>

<?php
$i=0;
?>
<div class="panel-body">

   Total Item: {{$decorations->total()}} <br>
    Item Per This Page: {{$decorations->perPage() }} <br>
    Item On This Page: {{$decorations->count() }} <br>
    Page No: {{$decorations->currentPage() }} <br>
    From Item {{$decorations->firstItem() }} To {{$decorations->lastItem() }}
    <br>
    <hr>
                            <table width="80%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
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
                                		<td align="center"><a href="{{ url('decoration/view/'. $decoration->user_id . '/' . $decoration->decorationCode )}}" target="___blank"> View</a>|<a href="{{ url('decoration/edit/'.$decoration->decorationCode )}}" target="___blank">Edit</a>|<a href="{{url('decoration/delete/'.$decoration->id )}}" onclick="return confirm('Are You Want To Delete Food_Item?')"> Delete </a> </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$decorations->links()}}
                        </div>
                      

