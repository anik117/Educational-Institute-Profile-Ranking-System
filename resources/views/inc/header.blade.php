<section id="fh5co-header">
	<div class="container">
		<nav role="navigation">
			<ul class="pull-left left-menu">
				<li><a href="/area">Area</a></li>
				<li><a href="/school">School</a></li>
				<li><a href="/about">About</a></li>
			</ul>
			<h1 id="fh5co-logo"><a href="/">School Ranking System<span>.</span></a></h1>
			<ul class="pull-right right-menu">
				@guest
				<li><a href="{{ route('login') }}">Login</a></li>
				<li class="fh5co-cta-btn"><a href="{{ route('register') }}">Register</a></li>
				@else
				<li>
				    @role('deo|ah|hm|sa')
				        <a href="/dashboard">Dashboard</a>
				    @endrole
				</li>
				<li class="fh5co-cta-btn">
					<a href="{{ route('logout') }}"
					    onclick="event.preventDefault();
					             document.getElementById('logout-form').submit();">
					    Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					    {{ csrf_field() }}
					</form>
				</li>
				@endguest
			</ul>
		</nav>
	</div>
</section>
<!-- #fh5co-header -->