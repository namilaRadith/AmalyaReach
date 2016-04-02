@extends('clientMasterPage')
@section('css_ref')
	@parent


@stop

@section('content')
		<!-- Slider -->
<div class="tp-banner-container">
	<div class="tp-banner">
		<ul>
			@foreach($imageList as $data)
			<!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
				<!-- MAIN IMAGE -->
				<img src="{{asset('client/img/slides_bg')}}{{'/'.$data->fileName}}" alt="slidebg1" data-lazyload="{{asset('client/img/slides_bg')}}{{'/'.$data->fileName}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
				<!-- LAYER NR. 1 -->
				<div class="tp-caption white_heavy_40 customin customout text-left text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5;max-width: auto; max-height: auto; white-space: nowrap;">{{$data->title}}
				</div>
				<!-- LAYER NR. 2 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-left" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
					<div style="color:#ffffff; font-size:16px; text-transform:uppercase;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);">
						{{$data->description}}
					</div>
				</div>
				<!-- LAYER NR. 3 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href='rooms_list.html' class="button_intro">View Rooms</a> <a href='all_activities.html' class=" button_intro outline">Activities</a>
				</div>
			</li>
			@endforeach

		</ul>

	</div>


	<div id="general_decor">
		<div class="container">
			<div class="col-md-4 pull-right">
				<div id="book">
					<div id="message-booking"></div>
					<form role="form" method="post" action="mainReservationFormSubmit" id="mainReservationForm" name="mainReservationForm" autocomplete="off">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Check in</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text" id="checkIn" name="checkIn" placeholder="Check in">
									<span class="input-icon"><i class=" icon-calendar"></i></span>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Check out</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text" id="checkOut" name="checkOut" placeholder="Check out">
									<span class="input-icon"><i class=" icon-calendar"></i></span>
								</div>
							</div>
						</div><!-- End row -->
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Adults</label>
									<div class="qty-buttons">
										<input type="button" value="-" class="qtyminus" name="adults">
										<input type="text" name="adults" id="adults" value="" class="qty form-control" placeholder="0">
										<input type="button" value="+" class="qtyplus" name="adults">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Children</label>
									<div class="qty-buttons">
										<input type="button" value="-" class="qtyminus" name="children">
										<input type="text" name="children" id="children"  value="" class="qty form-control" placeholder="0">
										<input type="button" value="+" class="qtyplus" name="children">
									</div>
								</div>
							</div>
						</div><!-- End row -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Room type</label>
									<select class="form-control" name="roomType" id="roomType">
										<option value="">Select room type</option>
										<option value="1">Single Room</option>
										<option value="2">Double Room</option>
										<option value="3">Luxury Single Room</option>
										<option value="4">Luxury Double Room</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Have a Code?</label>
									<input type="text" class="form-control" name="coding" id="coding" placeholder="Enter Code here">
								</div>
							</div>

							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input type="submit" value="Check Availability" class="btn_full" id="checkAvailability">
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>



			<!-- Promotions Message-->
			<div class="col-md-4 pull-left">
				<div id="book">
					<div id="message-booking"></div>
					<form role="form" method="post" action="assets/check_avail.php" id="check_avail" autocomplete="off">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label style="color: #3DA0DB"><i style="color: #7a43b6" class="fa fa-bookmark fa-3x"></i>
										Up to 30% off with Amayla Insider Deals!
										<a>Sign in to unlock</a></label><label style="margin-left: 46%;color: #932ab6" class="down"><i class="fa fa-angle-double-down fa-3x"></i></label>
								</div>
							</div>
						</div><!-- End row -->
						<div class="row" id="PromoShow">
							<div class="col-md-12 col-sm-12">
								<div class="form-group"><div class="my-slider" style="width:315px;height: 200px;">
										<ul style="margin-left: 25px;">
											<li><img src="{{ asset('client/img/images.jpg') }}"></li>
											<li><img src="{{ asset('client/img/images1.jpg') }}"></li>
											<li><img src="{{ asset('client/img/images2.jpg') }}"></li>
											<li><img src="{{ asset('client/img/images1.jpg') }}"></li>
											<li><img src="{{ asset('client/img/images.jpg') }}"></li>
										</ul>
									</div>

									<!-- There'll be a load of other stuff here -->
									<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
									<script src="{{asset('/client/js/unslider.js')}}"></script> <!-- but with the right path! -->
									<link rel="stylesheet" href="{{asset('/client/css/unslider.css')}}">
									<script>
										jQuery(document).ready(function($) {
											$('.my-slider').unslider({autoplay: true});

										});
									</script>
									<div style="height: 15px">

									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input type="submit" value="View Promotion" class="btn_full" id="submit-booking">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div align="center" class="form-group">
									<label class="up" style="color: #932ab6"><i class="fa fa-angle-double-up fa-3x"></i></label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- END Promotions Message-->

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

			<script type="text/javascript">

				$( document ).ready(function(){
					$("#PromoShow").hide();
				});

					$(".up").click(function () {
						$(".down").slideDown();
						$("#PromoShow").slideUp();
					});

					$(".down").click(function () {
						$(".down").slideUp();
						$("#PromoShow").slideDown();
					});
			</script>
		</div>
		<!--<a href="room_details.html" ><img height="250px" width="100%" src="{{ asset('client/sampleImages/room2.jpg') }}" alt=""></a>-->
	</div>

	<div id="general_decor_2">

	</div>


</div>



<!-- End Slider -->

<div class="container margin_60 padd_bottom_20">
	<div class="main_title">
		<span></span>
		<h2>Amalya Reach Holiday Resort</h2>
		<p>
			Finding the right space for your event is never easy and getting advice from friends, family, clients, co-workers or anyone is always great. we at amalya provides you a life time experience with our brand new wedding reception hallsand holiday resort which can be used for a memorable day in your life.

			First, it's always best to shop around for several locations to see what's on offer (and within budget) and always consider booking your party venue at least several months to a year in advance, say the experts. Take your time, and don't settle for the first location that comes along. Unusual venues like
			historic mansions, galleries, and even sailing yachts can provide memorable party spaces. Before you make the final decision, also remember to take into account who is on your guest list, and how accessible it may be for everyone involved
		</p>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="box_home">
				<i class="icon_set_2_icon-104"></i>
				<h3>Cozy and Charming rooms</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
				</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box_home">
				<i class="icon_set_2_icon-108"></i>
				<h3>Relax in a beautiful contest</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
				</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box_home">
				<i class="icon_set_1_icon-40"></i>
				<h3>Enjoy country side activities</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
				</p>
			</div>
		</div>
	</div><!-- End row -->
</div><!-- End container -->




<!--Special Offers Area -->
<div class="bg_gray add_bottom_60">
	<div class="col-md-12 col-sm-12"  style=" text-align: center;" >
	<h2>Special Offers</h2>
	<hr class="UpperLine">
	</div>
	<style>

		h2 { color: #990099; font-family: 'Sans-serif'; font-size: 36px; font-weight: normal; line-height: 48px; margin: 0 0 18px; text-shadow: 1px 0 0 #fff; }

		hr.UpperLine {
			height: 10px;
			border: 0;
			box-shadow: 0 10px 10px -10px #8c8b8b inset;
		}



		hr.LowerLine {
			height: 30px;
			border-style: solid;
			border-color: #8c8b8b;
			border-width: 1px 0 0 0;
			border-radius: 20px;
		}
		hr.LowerLine:before {
			display: block;
			content: "";
			height: 30px;
			margin-top: -31px;
			border-style: solid;
			border-color: #8c8b8b;
			border-width: 0 0 1px 0;
			border-radius: 20px;
		}




	</style>
	<div class="container" >
		<div class="row" >
			<div class="col-md-4 col-sm-4" >
				<div class="img_zoom">
					<a href="room_details.html"><img src="{{asset('client/img/images.jpg')}}" alt="" class="img-responsive"></a>
				</div>
				<h3> Our Reception Halls <span class="price_home">$90<em>Per night</em></span></h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
				</p>
				<p>
					<a href="#" class="btn_1">Read more</a>
				</p>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="img_zoom">
					<a href="room_details.html"><img src="{{asset('client/img/images1.jpg')}}" alt="" class="img-responsive"></a>
				</div>
				<h3>Scrumptious Menus <span class="price_home">$120<em>Per night</em></span></h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
				</p>
				<p>
					<a href="#" class="btn_1">Read more</a>
				</p>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="img_zoom">
					<a href="room_details.html"><img src="{{asset('client/img/images2.jpg')}}" alt="" class="img-responsive"></a>
				</div>
				<h3>Luxury Comfortable Rooms <span class="price_home">$140<em>Per night</em></span></h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
				</p>
				<p>
					<a href="#" class="btn_1">Read more</a>
				</p>
			</div>
		</div><!-- End row -->
	</div><!-- End container -->
</div>
<hr class="LowerLine">

<div class="container add_bottom_60">

	<div class="main_title add_bottom_45">
		<span></span>
		<h2>Facilities We Provide</h2>
		<p>

		</p>
	</div>
	<div class="row">
		<div class="col-md-8" id="strip_activities">
			<ul>
				<li>
					<img src="{{asset('client/img/activities_1_thumb.jpg')}}" alt="" class="img-circle styled">
					<h4>Swimming Pool </h4>
					<p>
						Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta, ut utamur antiopam inciderint sed. Ut iriure perpetua voluptaria has, vim postea denique in, mollis pertinax elaboraret sed in. Per no vidit timeam, quis omittam sed at. <a href="#" class="link_normal">Read more</a>
					</p>
				</li>
				<li><img src="{{asset('client/img/activities_2_thumb.jpg')}}" alt="" class="img-circle styled">
					<h4>Banquet Hall </h4>
					<p>
						Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta, ut utamur antiopam inciderint sed. Ut iriure perpetua voluptaria has, vim postea denique in, mollis pertinax elaboraret sed in. Per no vidit timeam, quis omittam sed at. <a href="#" class="link_normal">Read more</a>
					</p>
				</li>


			</ul>
		</div>
		<div class="col-md-4">
			<div class="box_style_1 text-center">
				<p ><img src="{{asset('client/img/best_price.png')}}" alt=""></p>
				<p>
					Id pri consul aeterno petentium. Vivendo abhorreant et vim, et quot persecuti mel. Libris hendrerit ex sea. Duo legere evertitur an, pri hinc <strong>doctus definitiones</strong> an, vix id dicam putent. Ius ornatus instructior in.
				</p>
				<p>
					Ad cum movet fierent assueverit, mei stet legere ne. Mel at vide soluta, ut utamur antiopam inciderint sed.
				</p>
			</div><!-- End box_style_1 -->

			<a class="box_style_1 weahter" href="about.html">
				<i class="icon-light-up"></i> View Weahter forecast </a>
			<!-- End  weather-->




			<div id="banner">
				<h3><span>-20% OFF</span>This week only for all rooms!</h3>
			</div><!-- End banner -->





		</div>
	</div><!-- End row -->
</div><!-- End container -->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 nopadding">
			<div class="features-bg">
				<div class="features-img">
				</div>
			</div>
		</div>
		<div class="col-md-6 nopadding">
			<div class="features-content">
				<h3>"Enjoy spectacular countryside"</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.
				</p>
				<p>
					<a href="#" class=" btn_1 white">Read more</a>
				</p>
			</div>
		</div>
	</div>
</div><!-- End container-fluid  -->



@stop



@section('js_ref')
	@parent
<!-- Specific scripts -->
<script src="{{asset('/client/js/quantity-bt.js')}}"></script>
<script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>
<script>$('input.date-pick').datepicker();</script>
@stop