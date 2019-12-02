
<hr>
<h3 style="color:green;">{{Session::get('message')}}</h3>

<?php
$i=0;
?>
<div class="panel-body">

  
                            <table width="80%" border="1" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                     <th>Company Name</th>
                                		<th>Manager Name</th>
                                		
                                		<th>Manager's Email</th>
                                	    <th>Manager's Contact Number</th>                          
                                		                              		
                                		
                                		<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	 @foreach($admins as $admin)
                                	<tr>
                                		 <td align="center">{{ ++$i}}</td>
                                         <td align="center">{{ $admin->companyName}}</td>
                                		<td align="center">{{ $admin->managerName}}</td>
                                		<td align="center">{{ $admin->managerEmail}}</td>
                                		<td align="center">{{ $admin->managerConNo}}</td>
                                	
                                		
                                		<td align="center"><a href="{{ url('adminprofile/view/'.$admin->user_id.'/'.$admin->companyName )}}" target="___blank"> View</a>|<a href="{{ url('adminprofile/edit/'.$admin->companyName)}}" target="___blank">Edit</a></td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            
                       
                        </div>
                      

