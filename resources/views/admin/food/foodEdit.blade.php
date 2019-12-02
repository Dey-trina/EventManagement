@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Edit Food-Item</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')

<div class="panel-body">
    <div class="row">
        <div class="col-lg-20">
                       
                        {!!Form::open(['url'=>'/food/edit','method'=>'post','enctype'=>'multipart/form-data','name'=>'foodEditForm'])!!} 

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
                                      <label>Food Name</label>
                                           <input type="text" class="form-control" name="name" value="{{$food->foodName}}" >
                                                 </div>

            

                <div class="form-group">
                                      <label>Cost</label>
                                           <input type="number" class="form-control" name="price" value="{{$food->cost}}">
                                                 </div>

  <div class="form-group">
                                      <label>Food Image</label>
                                           <input type="file" name="image" value="{{$food->foodImage}}">

                                                 </div>
                                                    <div class="form-group">
                                            <label>Food Type</label>
                                               <select name="foodType" class="form-control">
                                                 <option value='Rice'>Rice</option>
                                                <option value='Meat'>Meat</option>
                                                <option value='Fish'>Fish</option>
                                                <option value='Egg'>Egg</option>
                                                <option value='Vegetables'>Vegetables</option>
                                                  <option value='Fast Food'>Fast Food</option>
                                                    <option value='Starter'>Starter</option>
                                                      <option value='Snacks'>Snacks</option>
                                                      <option value='Dessert'>Dessert</option>
                                                        <option value='Drinks'>Drinks</option>

                                               </select> 
                                        </div>

                             <div class="form-group">
                                      <label>Food Description</label>
                                           <textarea class="form-control" name="foodDescription">{{$food->foodDescription}}</textarea>
                                                 </div>


      

      <input type="hidden" name="food_id" value="{{$food->id}}">                                  
                                       

  <div class="form-group">
                                      
                                          
                                            <input type="submit" class="btn btn-block btnprimary" name="submit" value="Update" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" />

                                                 </div>

                                                 {!!Form::close() !!}                                   </form>
                                </div>
   <script type="text/javascript">
                                  document.forms['foodEditForm'].elements['eventType'].value='{{$food->eventType}}'

                                  document.forms['foodEditForm'].elements['foodType'].value='{{$food->foodType}}'
                                </script>                            </div>
                        </div>




@endsection







