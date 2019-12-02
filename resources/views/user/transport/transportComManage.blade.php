<hr>
<h3 style="color:green;">{{Session::get('message')}}</h3>


<?php
$i=0;
?>
<div class="panel-body">

   Total Item: {{$transports->total()}} <br>
    Item Per This Page: {{$transports->perPage() }} <br>
    Item On This Page: {{$transports->count() }} <br>
    Page No: {{$transports->currentPage() }} <br>
    From Item {{$transports->firstItem() }} To {{$transports->lastItem() }}
    <br>
    <hr>
 
                            <table width="80%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                     <th>Event Type</th>
                                		<th>Transport Name</th>
                                		
                                		<th>Price</th>
                                	    <th>Image</th>                         
                                		                              		
                                		
                                		<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 @foreach($transports as $transport)
                                	<tr>
                                		 <td align="center">{{ ++$i}}</td>
                                         <td align="center">{{ $transport->eventType}}</td>
                                		<td align="center">{{ $transport->vehicleName}}</td>
                                		
                                		<td align="center">{{ $transport->cost}}</td>
                                		 <td align="center"><img src=" {{ asset($transport->vehicleImage)}}" width="100" height="80"  alt="no pic"> </td>
                                		
                                		<td align="center"><a href="{{ url('transport/com_view/'. $transport->user_id.'/'.$transport->vehicleName )}}" target="___blank"> View</a> </td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                         {{$transports->links()}}
                        </div>
                      

