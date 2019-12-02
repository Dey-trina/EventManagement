<div class="soft-ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			 <!-- <div class="container-fluid">
				 Brand and toggle get grouped for better mobile display -->
				
				<!-- Collect the nav links, forms, and other content for toggling -->
		<!--	<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="{{ url('/dashboardd')}}">User Dashboard <span class="sr-only">(current)</span></a></li>
					
					</ul>
				</div>-->
				<br>
				 <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                      <h4 style="color:black">  <a href="{{ url('/home') }}" >Home</a></h4>

                    @else
                     <h3>   <a href="{{ route('login') }}">Login</a></h3>
<!--<button type="submit" href="{{ route('login') }}" class="btn-btn-primary" style="color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
" align="center">Login</button>-->

                        @if (Route::has('register'))
                          <h3>  <a href="{{ route('register') }}">Register</a> </h3>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <br>
			 
			</nav>	
		</div>
	