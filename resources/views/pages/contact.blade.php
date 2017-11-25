
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SRS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="School Ranking System" />
	<meta name="author" content="Tanvir Ahassan" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/purple.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>

	<body>

	<!-- Loader -->
	<div class="fh5co-loader"></div>
	
	<div id="fh5co-page">

		<section id="fh5co-header">
			<div class="container">
				<nav role="navigation">
					<ul class="pull-left left-menu">
						<li><a href="/area">Area</a></li>
						<li><a href="/school">School</a></li>
						<li><a href="/about">About</a></li>
						<li class="active"><a href="/contact">Contact Us</a></li>
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

		<section id="fh5co-hero" class="js-fullheight" style="background-image: url(https://ak9.picdn.net/shutterstock/videos/5606639/thumb/2.jpg);" data-next="yes">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-intro js-fullheight">
					<div class="fh5co-intro-text">

						<div class="fh5co-center-position">
							<h2 class="animate-box">Contact Us for farther information</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END #fh5co-hero -->
		
		<section id="fh5co-testimonials">
			<div class="container">
				<div class="row row-bottom-padded-sm">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-lead animate-box">Get in touch</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center animate-box">
						<form action="#" method="post" class="form-horizontal animate-box">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter your name" id="name" name="name">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Enter your email" id="email" name="email">
							</div>
							<div class="form-group">
								<input type="phone" class="form-control" placeholder="Enter your phone" id="phone" name="phone">
							</div>
							<div class="form-group">
								<button class="btn btn-block btn-primary" type="submit" class="btn btn-primary">Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- END #fh5co-testimonials -->

		<footer id="fh5co-footer">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="fh5co-footer-widget">
							<h3>Company</h3>
							<ul class="fh5co-links">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Feature Tour</a></li>
								<li><a href="#">Pricing</a></li>
								<li><a href="#">Team</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="fh5co-footer-widget">
							<h3>Support</h3>
							<ul class="fh5co-links">
								<li><a href="#">Knowledge Base</a></li>
								<li><a href="#">24/7 Call Support</a></li>
								<li><a href="#">Video Demos</a></li>
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12 ">
						<div class="fh5co-footer-widget">
							<h3>Contact Us</h3>
							<p>
								<a href="mailto:info@freehtml5.co">info@freehtml5.co</a> <br>
								198 West 21th Street, <br>
								Suite 721 New York NY 10016 <br>
								<a href="tel:+123456789">+12 34  5677 89</a>
							</p>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="fh5co-footer-widget">
							<h3>Follow Us</h3>
							<ul class="fh5co-social">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-google-plus"></i></a></li>
								<li><a href="#"><i class="icon-instagram"></i></a></li>
								<li><a href="#"><i class="icon-youtube-play"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				
			</div>
			<div class="fh5co-copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="fh5co-left"><small>&copy; 2017 <a href="/">SRS</a> SRS, All Rights Reserved.</small></p>
							<p class="fh5co-right"><small class="fh5co-right">Designed by <a href="" target="_blank">Tanvir ahassan</a></small></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END #fh5co-footer -->
	</div>
	<!-- END #fh5co-page -->

	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	<!-- 
	INFO:
	jQuery Cookie for Demo Purposes Only. 
	The code below is to toggle the layout to boxed or wide 
	-->
	<script src="js/jquery.cookie.js"></script>
	<script>
		$(function(){

			if ( $.cookie('layoutCookie') != '' ) {
				$('body').addClass($.cookie('layoutCookie'));
			}

			$('a[data-layout="boxed"]').click(function(event){
				event.preventDefault();
				$.cookie('layoutCookie', 'boxed', { expires: 7, path: '/'});
				$('body').addClass($.cookie('layoutCookie')); // the value is boxed.
			});

			$('a[data-layout="wide"]').click(function(event){
				event.preventDefault();
				$('body').removeClass($.cookie('layoutCookie')); // the value is boxed.
				$.removeCookie('layoutCookie', { path: '/' }); // remove the value of our cookie 'layoutCookie'
			});
		});
	</script>
	</body>
</html>

