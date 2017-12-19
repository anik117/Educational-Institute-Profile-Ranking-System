@extends ('layouts.home')

@section('content')

		<section id="fh5co-hero" class="js-fullheight" style="background-image: url(http://www.vmagroup.com/wp-content/uploads/2015/12/backtoschool1.jpg);" data-next="yes">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-intro js-fullheight">
					<div class="fh5co-intro-text">
						<!-- 
							INFO:
							Change the class to 'fh5co-right-position' or 'fh5co-center-position' to change the layout position
							Example:
							<div class="fh5co-right-position">
						-->
						<div class="fh5co-center-position">
							<h2 class="animate-box">Ranks School From Different Areas</h2>
							<p class="animate-box"><a href="/about" class="btn btn-primary">Learn More</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-learn-more animate-box">
				<a href="#" class="scroll-btn">
					<span class="text">Explore Ranking</span>
					<span class="arrow"><i class="icon-chevron-down"></i></span>
				</a>
			</div>
		</section>
		<!-- END #fh5co-hero -->


		<section id="fh5co-projects">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-lead animate-box">Top Schools</h2>
						<p class="fh5co-sub-lead animate-box">
							Recent top positioned schools.
						</p>
					</div>
				</div>

				<div class="row">

					@foreach ($schools as $index => $school)
					<div class="col-md-4 col-sm-6 col-xxs-12 animate-box">
						<a href="/school/{{$school->id}}" target="_blank" class="fh5co-project-item">
							<div class="fh5co-text">
								<h1 class="text-center">{{ $index +1 }}.</h1>
								<h2>{{ $school->name }}</h2>
								<p>{{ $school->area->thana }}, {{ $school->area->district }}</p>
							</div>
						</a>
					</div>
					@endforeach

				</div>
			</div>
		</section>
		<!-- END #fh5co-projects -->


		<section id="fh5co-projects">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-lead animate-box">Schools Charts</h2>
						<p class="fh5co-sub-lead animate-box">
							School charts
						</p>
					</div>
				</div>

				<div class="row">
					@foreach ($schools as $school)
					<div class="col-md-6 col-sm-6 col-xxs-12 animate-box">
						<a href="/school/{{$school->id}}" target="_blank">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>{{ $school->name }}</h4>
								</div>
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua..</p>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</section>

		<section id="fh5co-features-2" style="background: #fff">
			<div class="container">
				<div class="col-md-12">
					<h2 class="fh5co-lead text-center">List of Ranking</h2>

					@foreach ($schools as $index => $school)
					<div class="fh5co-feature">
						<div class="fh5co-icon">
							<i>{{ $index +1 }}.</i>
						</div>
						<a href="/school/{{$school->id}}" target="_blank">
							<div class="fh5co-text">
								<h3>{{$school->name}}</h3>
								<h4>{{ $school->area->thana }}, {{ $school->area->district }}</h4>
							</div>
						</a>
					</div>
					@endforeach

					<div class="fh5co-btn-action">
						<a href="#" class="btn btn-primary">More Rankings</a>
					</div>

				</div>
			</div>
		</section>
		<!-- END #fh5co-features-2 -->

		<section id="fh5co-subscribe">
			<div class="container">
		
				<h3><label for="email">Subscribe to our newsletter</label></h3>
				<form action="#" method="post">
					<i class="fh5co-icon icon-paper-plane"></i>
					<input type="email" class="form-control" placeholder="Enter your email" id="email" name="email">
					<input type="submit" value="Send" class="btn btn-primary">
				</form>

			</div>
		</section>
		<!-- END #fh5co-subscribe -->

@endsection