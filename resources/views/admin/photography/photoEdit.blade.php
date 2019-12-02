@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Edit Photography</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')

<div class="panel-body">
    <div class="row">
        <div class="col-lg-20">
                       
                        {!!Form::open(['url'=>'/photo/edit','method'=>'post','enctype'=>'multipart/form-data','name'=>'photoEditForm'])!!} 

                          <div class="form-group">
                                            <label>Event Type</label>
                                               <select name="eventType" class="form-control">
                                                 <option value='Marriage'>Marriage</option>
                                                <option value='Anniversary'>Anniversary</option>
                                                <option value='Birthday'>Birthday</option>
                                                <option value='Reception'>Reception</option>
                                                <option value='Pre Wedding Ceremony'>Pre Wedding Ceremony</option>

                                               </select> 
                                        </div> 
                                                   
                      <div class="form-group">
                        <label>Photography Company Name</label>
                                           <input type="text" class="form-control" name="name" value="{{$photos->photographyCompanyName}}">
                                                 </div>

            

                <div class="form-group">
                                      <label>Photography Cost</label>
                                           <input type="number" class="form-control" name="price" value="{{$photos->photographyCost}}">
                                                 </div>

<div class="form-group">
                                      <label>Photography Demo</label>
                                           <input type="file" name="image[]" multiple="true" value="{{$photos->photographyDemo}}">

                                                 </div>
      

                  
      

      <input type="hidden" name="venue_id" value="{{$photos->id}}">                                  
                                       

  <div class="form-group">
                                      
                                          
                                            <input type="submit" class="btn btn-block btnprimary" name="submit" value="Update" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" />

                                                 </div>

                                                 {!!Form::close() !!}                                   </form>
                                </div>
   <script type="text/javascript">
                                  document.forms['photoEditForm'].elements['eventType'].value='{{$photos->eventType}}'

                       
                                </script>                            </div>
                        </div>




@endsection







