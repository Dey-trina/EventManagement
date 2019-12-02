@extends('frontView.master')

@section('title_area')
User Home
@endsection
@section('css_js')
<link href="{{asset('frontEnd')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- pignose css -->
<link href="{{asset('frontEnd')}}/css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all" />


<!-- //pignose css -->
<link href="{{asset('frontEnd')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="{{asset('frontEnd')}}/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="{{asset('frontEnd')}}/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="{{asset('frontEnd')}}/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='{{asset('frontEnd')}}///fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='{{asset('frontEnd')}}///fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="{{asset('frontEnd')}}/js/jquery.easing.min.js"></script>
@endsection
@section('feature')
<div class="banner-grid">
	<div id="visual">
			<div class="slide-visual">
				<!-- Slide Image Area (1000 x 424) -->
				<ul class="slide-group">
					<li><img class="img-responsive" src="{{asset('frontEnd')}}/images/a.jpg"  /></li>
					<li><img class="img-responsive" src="{{asset('frontEnd')}}/images/b.jpg"  /></li>
					<li><img class="img-responsive" src="{{asset('frontEnd')}}/images/c.jpg"  /></li>
				</ul>

				<!-- Slide Description Image Area (316 x 328) -->
				<div class="script-wrap">
					<ul class="script-group">
						<li><div class="inner-script"><img class="img-responsive" src="{{asset('frontEnd')}}/images/i.jpg" /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="{{asset('frontEnd')}}/images/j.jpg"  /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="{{asset('frontEnd')}}/images/k.jpg"  /></div></li>
						<li><div class="inner-script"><img class="img-responsive" src="{{asset('frontEnd')}}/images/l.jpg"  /></div></li>
					</ul>
					<div class="slide-controller">
						<a href="#" class="btn-prev"><img src="{{asset('frontEnd')}}/images/btn_prev.png" alt="Prev Slide" /></a>
						<a href="#" class="btn-play"><img src="{{asset('frontEnd')}}/images/btn_play.png" alt="Start Slide" /></a>
						<a href="#" class="btn-pause"><img src="{{asset('frontEnd')}}/images/btn_pause.png" alt="Pause Slide" /></a>
						<a href="#" class="btn-next"><img src="{{asset('frontEnd')}}/images/btn_next.png" alt="Next Slide" /></a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	<script type="text/javascript" src="{{asset('frontEnd')}}/js/pignose.layerslider.js"></script>
	<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
	</script>

</div>
<!-- //banner -->
<!-- content -->
@endsection

