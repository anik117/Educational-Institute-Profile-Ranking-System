@extends ('layouts.home')

@section('content')

		<section id="fh5co-hero" class="js-fullheight" style="background-image: url(https://cdn.pixabay.com/photo/2016/10/29/09/31/abstract-1780181_960_720.png);" data-next="yes">
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
					<span class="arrow"><i class="icon-chevron-down"></i></span>
				</a>
			</div>
		</section>
		<!-- END #fh5co-hero -->
		<!-- END #fh5co-projects -->

		<section id="fh5co-features-2" style="background: #fff">
			<div class="container">
				<div class="col-md-12">
					<h2 class="fh5co-lead text-center">List of Ranking</h2>

					@foreach ($ranks as $index => $rank)
					<div class="fh5co-feature">
						<div class="fh5co-icon">
							<i>{{ $index +1 }}</i>
						</div>
						<a href="/school/{{$rank->school->id}}" target="new">
							<div class="fh5co-text">
								<h3>{{$rank->school->name}}</h3>
								<h4>{{ $rank->school->area->thana }}, {{ $rank->school->area->district }}</h4>
							</div>
						</a>
					</div>
					@endforeach
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