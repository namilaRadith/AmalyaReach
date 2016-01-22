<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="farm activities, itineraries, farm holidays, country holidays, bed and breakfast, hotel, country hotel" />
	<meta name="description" content="Country Holidays - Premium site template for a country accommodation.">
	<meta name="author" content="Ansonika">
	<title>Country Holidays - Premium site template for a country accommodation.</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="{{asset('/client/img/favicon.ico" type="image/x-icon')}}">
	<link rel="apple-touch-icon" type="image/x-icon" href="{{asset('/client/img/apple-touch-icon-57x57-precomposed.png')}}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('/client/img/apple-touch-icon-72x72-precomposed.png')}}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('/client/img/apple-touch-icon-114x114-precomposed.png')}}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('/client/img/apple-touch-icon-144x144-precomposed.png')}}">

	<!-- Google web fonts -->
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>

	@section('css_ref')
	<!-- BASE CSS -->
	<link href="{{asset('/client/css/base.css')}}" rel="stylesheet">
	<!-- REVOLUTION SLIDER CSS -->
	<link href="{{asset('/client/rs-plugin/css/settings.css')}}" rel="stylesheet">
	<link href="{{asset('/client/css/extralayers.css')}}" rel="stylesheet">

	@show

</head>

<body>

<!--[if lte IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

<div id="preloader">
	<div class="sk-spinner sk-spinner-wave">
		<div class="sk-rect1"></div>
		<div class="sk-rect2"></div>
		<div class="sk-rect3"></div>
		<div class="sk-rect4"></div>
		<div class="sk-rect5"></div>
	</div>
</div>
<!-- End Preload -->



<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header================================================== -->
<header>
	<div id="top_line">
		<div class="container">
			<ul id="top_links">
				<li><a href="#">En</a></li>
				<li><a href="#">Fr</a></li>
				<li><a href="#">Es</a></li>
			</ul>
			<a href="#" id="link_bt">Purchase this template</a>
		</div><!-- End container-->
	</div><!-- End top line-->

	<div id="top_header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4">
					<div id="logo">
						<a href="{{action('WelcomeController@index')}}"><img src="{{asset('/client/img/logo.png')}}" width="240" height="40" alt="CountryHolidays" data-retina="true"></a>
					</div>
				</div>
				<nav class="col-md-8 col-sm-8 col-xs-8">
					<a class="cmn-toggle-switch cmn-toggle-switch__rot  open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
					<div class="main-menu">
						<div id="header_menu">
							<img src="{{asset('/client/img/logo.png')}}" width="240" height="40" alt="CountryHolidays" data-retina="true">
						</div>
						<a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="{{action('clientNavigationController@showAbout')}}">About</a></li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">Dinning <i class="icon-down-open-mini"></i></a>
								<ul>
									<li><a href="{{action('clientNavigationController@showDinningList')}}">All Recipes List</a></li>
									<li><a href="#">Horses</a></li>
									<li><a href="#">Discover local food</a></li>
									<li><a href="#">Cooking local food</a></li>
									<li><a href="#">Farm activities</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">Accomadation <i class="icon-down-open-mini"></i></a>
								<ul>
									<li><a href="{{action('clientNavigationController@showRoomList')}}">Accommodation List</a></li>
									<li><a href="#">Horses</a></li>
									<li><a href="#">Discover local food</a></li>
									<li><a href="#">Cooking local food</a></li>
									<li><a href="#">Farm activities</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">Facilities <i class="icon-down-open-mini"></i></a>
								<ul>
									<li><a href="{{action('clientNavigationController@showFacilitiesList')}}">All Facilities</a></li>
									<li><a href="#">Horses</a></li>
									<li><a href="#">Discover local food</a></li>
									<li><a href="#">Cooking local food</a></li>
									<li><a href="#">Farm activities</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);" class="show-submenu">Functions<i class="icon-down-open-mini"></i></a>
								<ul>
									<li><a href="{{action('clientNavigationController@showFunctionList')}}">All Functions</a></li>
									<li><a href="#">Horses</a></li>
									<li><a href="#">Discover local food</a></li>
									<li><a href="#">Cooking local food</a></li>
									<li><a href="#">Farm activities</a></li>
								</ul>
							</li>

							{{--contact page navigation link	--}}
							<li><a href="{{action('feedbackController@create')}}">Contact us </a></li>


						</ul>
					</div><!-- End main-menu -->

				</nav>
			</div>
		</div>
	</div>
</header><!-- End Header -->

@yield('content')



<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-3">
				<h3>Contacts</h3>
				<ul id="contact_details_footer">
					<li>Route de Sablet 1023, Marseille<br>France 01923</li>
					<li><a href="tel://004542344599">+45 423 445 99</a> / <a href="tel://004542344599">+45 423 445 99</a></li>
					<li><a href="mailto:info@countryholidays.com">info@countryholidays.com</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-2">
				<h3>About</h3>
				<ul>
					<li><a href="#">About us</a></li>
					<li><a href="#">Rooms</a></li>
					<li><a href="#">Activities</a></li>
					<li><a href="#">Contact us</a></li>
					<li><a href="{{action('clientNavigationController@showGallery')}}">Gallery</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-3">
				<h3>Change language</h3>
				<ul>
					<li><a href="#">English</a></li>
					<li><a href="#">French</a></li>
					<li><a href="#">Spanish</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-sm-3"  id="newsletter">
				<h3>Newsletter</h3>
				<p>Join our newsletter to keep be informed about offers and news.</p>
				<div id="message-newsletter_2"></div>
				<form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
					<div class="form-group">
						<input name="email_newsletter_2" id="email_newsletter_2"  type="email" value=""  placeholder="Your mail" class="form-control">
					</div>
					<input type="submit" value="Subscribe" class="btn_1 white" id="submit-newsletter_2">
				</form>
			</div>
		</div><!-- End row -->
		<div class="row">
			<div class="col-md-12">
				<div id="social_footer">
					<ul>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-google"></i></a></li>
						<li><a href="#"><i class="icon-instagram"></i></a></li>
						<li><a href="#"><i class="icon-pinterest"></i></a></li>
						<li><a href="#"><i class="icon-vimeo"></i></a></li>
						<li><a href="#"><i class="icon-youtube-play"></i></a></li>
					</ul>
					<p>� CountryHolidays 2015</p>
				</div>
			</div>
		</div><!-- End row -->
	</div><!-- End container -->
</footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

@section('js_ref')
<!-- Common scripts -->
<script src="{{ asset('/client/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{ asset('/client/js/common_scripts_min.js')}}"></script>
<script src="{{ asset('/client/js/functions.js')}}"></script>
<script src="{{ asset('/client/assets/validate.js')}}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="{{ asset('/client/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('/client/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('/client/js/revolution_func.js')}}"></script>
@show


</body>
</html>