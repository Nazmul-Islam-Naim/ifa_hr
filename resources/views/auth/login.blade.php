<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="UniPro App">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{asset('custom/img/fav.png')}}" />

		<!-- Title -->
		<title>UniPro Login</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		{!!Html::style('custom/css/bootstrap.min.css')!!}

		<!-- Icomoon Font Icons css -->
		{!!Html::style('custom/fonts/style.css')!!}
		
		<!-- Main css -->
		{!!Html::style('custom/css/main.css')!!}


		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>
	<body class="authentication">

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>
		<!-- Loading wrapper end -->

		<!-- *************
			************ Login container start *************
		************* -->
		<div class="login-container">

			<div class="container-fluid h-100">
			
			<!-- Row start -->
			<div class="row g-0 h-100">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-about">
						<div class="slogan">
							<span>Design</span>
							<span>Made</span>
							<span>Simple.</span>
						</div>
						<div class="about-desc">
							UniPro a data dashboard is an information management tool that visually tracks, analyzes and displays key performance indicators (KPI), metrics and key data points to monitor the health of a business, department or specific process.
						</div>
						<a href="crm.html" class="know-more">Know More <img src="{{asset('custom/img/right-arrow.svg')}}" alt="Uni Pro Admin"></a>

					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form name="form" action="{{ url('/login')}}"  class="login-form" method="POST" id="form">
    						{{ csrf_field() }}
							<div class="login-screen">
								<div class="login-body">
									<a href="crm.html" class="login-logo">
										<img src="{{asset('custom/img/logo-colors.svg')}}" alt="Uni Pro Admin">
									</a>
									<h6>Welcome back,<br>Please login to your account.</h6>
									@if(Session::get('error'))
									<div class="alert alert-danger" role="alert" style="margin-bottom: 30px">
									    <ul style="list-style-type:none">
									      <li><span class="icon-error"></span> {{ Session::get('error') }}</li>
									      <?php Session::put('error', NULL); ?>
									    </ul>
									</div>
									@elseif ($errors->has('email'))
										<div class="alert alert-danger" role="alert" style="margin-bottom: 30px">
											<span class="icon-error"></span> {{ $errors->first('email') }}
										</div>
									@endif
									<div class="field-wrapper">
										<input type="email" name="email" value="{{ old('email') }}" autofocus>
										<div class="field-placeholder">Email ID</div>
									</div>
									<div class="field-wrapper mb-3">
										<input type="password" name="password">
										<div class="field-placeholder">Password</div>
									</div>
									<div class="actions">
										<a href="#">Forgot password?</a>
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
								</div>
								<div class="login-footer">
									<span class="additional-link">No Account? <a href="#" class="btn btn-light">Sign Up</a></span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Row end -->

		
			</div>
		</div>
		<!-- *************
			************ Login container end *************
		************* -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		{!!Html::script('custom/js/jquery.min.js')!!}
		{!!Html::script('custom/js/bootstrap.bundle.min.js')!!}
		{!!Html::script('custom/js/modernizr.js')!!}
		{!!Html::script('custom/js/moment.js')!!}
		
		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Main Js Required -->
		{!!Html::script('custom/js/main.js')!!}

	</body>
</html>