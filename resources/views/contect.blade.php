@extends('layouts.frontendapp')
@section('frontend_content')

	<!-- Page -->
	<div class="page-area contact-page">
		<div class="container spad">
			<div class="text-center">
				<h4 class="contact-title">Get in Touch</h4>
			</div>

			@if(session('zakaria'))
				<div class="alert alert-success">
					{{session('zakaria')}}
				</div><br>
			@endif




			<form class="contact-form" method="post" action="{{url('contact/insert')}}">
        @csrf

				<div class="row">
					<div class="col-md-6">
						<input type="text" placeholder="First Name *" name='first_name'>
					</div>
					<div class="col-md-6">
						<input type="text" placeholder="Last Name *" name='last_name'>
					</div>
					<div class="col-md-12">
						<input type="text" placeholder="Subject" name='subject'>
						<textarea placeholder="Message" name="message"></textarea>
						<div class="text-center">
							<button type="submit" class="site-btn">Send Message</button>
						</div>
					</div>
				</div>
			</form><br><br><br>



		</div>

	</div>
	<!-- Page end -->

@endsection
