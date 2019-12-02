@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Edit Sound</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')

<div class="panel-body">
    <div class="row">
        <div class="col-lg-20">
                       
                        {!!Form::open(['url'=>'/sound/edit','method'=>'post','enctype'=>'multipart/form-data','name'=>'soundEditForm'])!!} 


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
                                      <label>Sound Company Name</label>
                                           <input type="text" class="form-control" name="name" value="{{$sound->soundCompanyName}}" >
                                                 </div>

            

                <div class="form-group">
                                      <label>Cost</label>
                                           <input type="number" class="form-control" name="price" value="{{$sound->cost}}">
                                                 </div>


      

      <input type="hidden" name="sound_id" value="{{$sound->id}}">                                  
                                       

  <div class="form-group">
                                      
                                          
                                            <input type="submit" class="btn btn-block btnprimary" name="submit" value="Update" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" />

                                                 </div>

                                                 {!!Form::close() !!}                                   </form>
                                </div>
 <script type="text/javascript">
                                  document.forms['soundEditForm'].elements['eventType'].value='{{$sound->eventType}}'

                                  
                                </script>                             </div>
                        </div>




@endsection







