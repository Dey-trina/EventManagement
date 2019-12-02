@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')
Add Company Profile
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')



<div class="panel-body">
    <div class="row">
        <div class="col-lg-20">

   {!!Form::open(['url'=>'/adminprofile/addadminprofile','method'=>'post','enctype'=>'multipart/form-data','role'=>'form'])!!}
                              <div class="form-group">
                                      <label>Company Name</label>
                                           <input class="form-control" name="cname" placeholder="Enter Company Name">
                                                 </div>

                                                 <div class="form-group">
                                      <label>Manager Name</label>
                                           <input class="form-control" name="mname" placeholder="Enter Manager's Name">
                                                 </div>

                                                 <div class="form-group">
                                            <label>Manager E-mail</label>
                                               <textarea class="form-control" name="memail" placeholder="Enter Manager's E-mail Address"></textarea> 
                                              </div>
                                          
                                                 <div class="form-group">
                                            <label>Manager Contact-No</label>
                                               <textarea class="form-control" name="mcon" placeholder="Enter Manager's Contact-No"></textarea> 
                                            </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                               <textarea class="form-control" name="address" placeholder="Enter the address"></textarea> 
                                        </div>

                                          <div class="form-group">
                                            <label>Company Description</label>
                                               <textarea class="form-control" name="companyDescription" placeholder="Enter the Company Description"></textarea> 
                                        </div>

                                            <div class="form-group">
                                      <label>Company Logo</label>
                                           <input type="file" name="image">
                                                 </div>

                                  <div class="form-group">
                             <input type="submit" class="btn btn-block btnprimary" name="submit" value="Submit" style="color: #fff;
                                background-color: #5bc0de;
              border-color: #46b8da;" />
                                    </div>
 {!!Form::close() !!}
                               

</div>
</div>
</div>
@endsection
                       
