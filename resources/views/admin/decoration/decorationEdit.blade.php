@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')
Edit Designs
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')

<div class="panel-body">
    <div class="row">
        <div class="col-lg-20">
                       
                        {!!Form::open(['url'=>'/decoration/edit','method'=>'post','enctype'=>'multipart/form-data','name'=>'designEditForm'])!!} 

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
                                      <label>Decoration Code</label>
                                           <input type="text" class="form-control" name="code" value="{{$decoration->decorationCode}}" >
                                                 </div>

            

                <div class="form-group">
                                      <label>Cost</label>
                                           <input type="number" class="form-control" name="price" value="{{$decoration->cost}}">
                                                 </div>

  <div class="form-group">
                                      <label>Decoration Image</label>
                                           <input type="file" name="image" value="{{$decoration->decorationImage}}">

                                                 </div>
                                                   <div class="form-group">
                                            <label>Decoration Type</label>
                                               <select name="decorationType" class="form-control">
                                                <option value='Stage'>Stage</option>
                                                <option value='Gate'>Gate</option>
                                                <option value='Hall'>Hall</option>
                                                <option value='Dala'>Dala</option>
                                                <option value='Car'>Car</option>
                                               </select> 
                                        </div>
      

      <input type="hidden" name="decoration_id" value="{{$decoration->id}}">                                  
                                       

  <div class="form-group">
                                      
                                          
                                            <input type="submit" class="btn btn-block btnprimary" name="submit" value="Update" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" />

                                                 </div>

                                                 {!!Form::close() !!}                                   </form>
                                </div>
 <script type="text/javascript">
                                  document.forms['decorationEditForm'].elements['decorationType'].value='{{$decoration->decorationType}}'
                                   
                                  document.forms['decorationEditForm'].elements['eventType'].value='{{$decoration->eventType}}'

                                  
                                </script>                             </div>
                        </div>




@endsection







