@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')
Edit Admin Profile
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')

<div class="panel-body">
    <div class="row">
        <div class="col-lg-20">
                       
                        {!!Form::open(['url'=>'/adminprofile/edit','method'=>'post','enctype'=>'multipart/form-data','name'=>'adminEditForm'])!!} 

                                                   
                        <div class="form-group">
                                      <label>Company Name</label>
                                           <input class="form-control" name="cname" value="{{$admin->companyName}}" >
                                                 </div>

                                                 <div class="form-group">
                                      <label>Manager Name</label>
                                           <input class="form-control" name="mname" value="{{$admin->managerName}}" >
                                                 </div>

                                                 <div class="form-group">
                                            <label>Manager E-mail</label>
                                               <textarea class="form-control" name="memail">{{$admin->managerEmail}}</textarea> 
                                              </div>
                                          
                                                 <div class="form-group">
                                            <label>Manager Contact-No</label>
                                               <textarea class="form-control" name="mcon">{{$admin->managerConNo}}</textarea> 
                                            </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                               <textarea class="form-control" name="address">{{$admin->address}}</textarea> 
                                        </div>

                                          <div class="form-group">
                                            <label>Company Description</label>
                                               <textarea class="form-control" name="companyDescription">{{$admin->companyDescription}}</textarea> 
                                        </div>

                                            <div class="form-group">
                                      <label>Company Logo</label>
                                           <input type="file" name="image">
                                                 </div>
                                                 <input type="hidden" name="admin_id" value="{{$admin->id}}"> 
  						<div class="form-group">
                                      
                                          
                        <input type="submit" class="btn btn-block btnprimary" name="submit" value="Update" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" />
                                                 </div>

                                                 {!!Form::close() !!}                                   </form>
                                </div>
                           </div>
                        </div>




@endsection







