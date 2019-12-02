@extends('layouts.master')

@section('pageTitle')
Admin Dashboard
@endsection

@section('contentHeading')
<h4 align="left"><a href="javascript:history.go(-1)"onMouseOver="self.status.referrer;return true">Back</a></h4>
<h3>Edit Venues</h3>
<hr>
<h4 style="color:green;">{{Session::get('message')}}</h4>
@endsection

@section('mainContent')

<div class="panel-body">
	<div class="row">
		<div class="col-lg-20">

			{!!Form::open(['url'=>'/venue/edit','method'=>'post','enctype'=>'multipart/form-data','name'=>'venueEditForm'])!!} 

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
				<label>Venue Name</label>
				<input type="text" class="form-control" name="name" value="{{$venue->venueName}}">
			</div>



			<div class="form-group">
				<label>Cost</label>
				<input type="number" class="form-control" name="price" value="{{$venue->cost}}">
			</div>

			<div class="form-group">
				<label>Food Image</label>
				<input type="file" name="image[]" multiple="true" value="{{$venue->image}}">

			</div>


			<div class="form-group">
				<label>Location</label>
				<textarea class="form-control" name="location" placeholder="Enter The Location" >{{$venue->location}}</textarea> 
			</div>


			<input type="hidden" name="venue_id" value="{{$venue->id}}">                                  

<input type="hidden" name="hdn_venue_name" value="{{$venue->venueName}}">  
			<div class="form-group">


				<input type="submit" class="btn btn-block btnprimary" name="submit" value="Update" style="color: #fff;
				background-color: #5bc0de;
				border-color: #46b8da;
				" />

			</div>

		{!!Form::close() !!}                                   </form>
	</div>
	<script type="text/javascript">
		document.forms['venueEditForm'].elements['eventType'].value='{{$venue->eventType}}'


	</script>
</div>
</div>




@endsection







