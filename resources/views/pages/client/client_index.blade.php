@extends('client_master_page')
@section('css_ref')
	@parent


@stop

@section('content')
		<!-- Slider -->
<div class="tp-banner-container">
	<div class="tp-banner">
		<ul>
			<!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
				<!-- MAIN IMAGE -->
				<img src="{{asset('client/img/slides_bg/slider_1.jpg')}}" alt="slidebg1" data-lazyload="{{asset('client/img/slides_bg/slide_1.jpg')}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
				<!-- LAYER NR. 1 -->
				<div class="tp-caption white_heavy_40 customin customout text-left text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5;max-width: auto; max-height: auto; white-space: nowrap;">Country Holidays pleasure
				</div>
				<!-- LAYER NR. 2 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-left" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
					<div style="color:#ffffff; font-size:16px; text-transform:uppercase;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);">
						Rooms / Country activities / Pleasure</div>
				</div>
				<!-- LAYER NR. 3 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href='rooms_list.html' class="button_intro">View Rooms</a> <a href='all_activities.html' class=" button_intro outline">Activities</a>
				</div>
			</li>

			<!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
				<!-- MAIN IMAGE -->
				<img src="{{asset('client/img/slides_bg/slider_2.jpg')}}" alt="slidebg1" data-lazyload="{{asset('client/img/slides_bg/slide_2.jpg')}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
				<!-- LAYER NR. 1 -->
				<div class="tp-caption white_heavy_40 customin customout text-center text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Discover fantastic places
				</div>
				<!-- LAYER NR. 2 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-left" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
					<div style="color:#ffffff; font-size:16px; text-transform:uppercase;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);">
						We offer a variety of services and options</div>
				</div>
				<!-- LAYER NR. 3 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href='rooms_list.html' class="button_intro">View Rooms</a> <a href='all_activities.html' class=" button_intro outline">Activities</a>
				</div>
			</li>

			<!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
				<!-- MAIN IMAGE -->
				<img src="{{asset('client/img/slides_bg/slider_3.jpg')}}" alt="slidebg1" data-lazyload="{{asset('client/img/slides_bg/slide_3.jpg')}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
				<!-- LAYER NR. 1 -->
				<div class="tp-caption white_heavy_40 customin customout text-left text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Enjoy Countryside  Activities
				</div>
				<!-- LAYER NR. 2 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-left" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
					<div style="color:#ffffff; font-size:16px; text-transform:uppercase;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);">
						Rooms / Country activities / Pleasure</div>
				</div>
				<!-- LAYER NR. 3 -->
				<div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href='rooms_list.html' class="button_intro">View Rooms</a> <a href='all_activities.html' class=" button_intro outline">Activities</a>
				</div>
			</li>
		</ul>

	</div>


	<div id="general_decor">
		<div class="container">
			<div class="col-md-4 pull-right">
				<div id="book">
					<div id="message-booking"></div>
					<form role="form" method="post" action="assets/check_avail.php" id="check_avail" autocomplete="off">

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Check in</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text" id="check_in" name="check_in" placeholder="Check in">
									<span class="input-icon"><i class=" icon-calendar"></i></span>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Check out</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text" id="check_out" name="check_out" placeholder="Check out">
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
									<select class="form-control" name="room_type" id="room_type">
										<option value="">Select room type</option>
										<option value="Single Room">Single Room</option>
										<option value="Double Room">Double Room</option>
										<option value="Luxury Double Room">Luxury Double Room</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name_booking" id="name_booking" placeholder="Name and Last name">
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email_booking" id="email_booking" placeholder="Your email">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input type="submit" value="Book now" class="btn_full" id="submit-booking">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

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

<div class="bg_gray add_bottom_60">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="img_zoom">
					<a href="room_details.html"><img src="{{asset('client/img/room_1.jpg')}}" alt="" class="img-responsive"></a>
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
					<a href="room_details.html"><img src="{{asset('client/img/room_2.jpg')}}" alt="" class="img-responsive"></a>
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
					<a href="room_details.html"><img src="{{asset('client/img/room_3.jpg')}}" alt="" class="img-responsive"></a>
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
				<h3><span>-30% OFF</span>This week only for all rooms!</h3>
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