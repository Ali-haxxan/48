<!doctype html>
<html>

<!-- Mirrored from 48-h.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- @notifyCss --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$settings->title}}</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('logo/'.$settings->logo)}}" />
    {{-- <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}"> --}}
	{{-- <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script> --}}

   <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/bootstrap.min.css')}}" />
   {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/auction.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/sweetalert/sweetalert.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/lightgallery/css/lightgallery.css')}}" />

    <script src="{{asset('48h/assets/site/main/js/jquery-3.3.1.min.js')}}"></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{asset('48h/assets/site/main/js/bootstrap.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/custom.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/script.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/sha.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/owl.carousel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <script src="{{asset('48h/assets/site/sweetalert/sweetalert.js')}}" type="text/javascript"></script>
    <script src="{{asset('48h/assets/site/lightgallery/js/lightgallery-all.min.js')}}" type="text/javascript"></script>

    <script>
        $(function() { $('.alert').delay(5000).fadeOut(10000); });
    </script>
	<style>
        .btn-features:hover {
            background: lightgrey;
        }
        .child-li{
            display: none;
        }
        .menu-bar li:hover .child-li{
            display: block;
            position: absolute;
            margin-left: 110px;
            margin-top: -34px;
        }
        .menu-bar li:hover .child-li ul{
            display: block;
        }

        </style>

</head>
		<body class="bodybg">

			@include('48-h/header')
			{{-- @include('notify::messages') --}}
        {{-- <x:notify-messages />
			@notifyJs --}}
<style>

   .nav-link {

   font-size: 0.85em !important;
    margin-top: 4px !important;
   }

/* Dropdown Menu */
nav ul li ul {
 position:absolute;
    background: #eeefea;
    width: auto;
	padding: 10px;

    display: none; }
nav ul li ul li {
    text-align: left;
    width: 20%; }

nav ul li:hover ul { display: block;
z-index:1000000;}
	</style>

	<script>

	// var upgradeTime = <?php echo json_encode($TSeconds); ?>;
	// var seconds = upgradeTime;
	// function timer() {
	// 	var hours        = Math.floor(seconds/60/60);
	// 	var minutesLeft   = Math.floor((seconds) - (hours*3600));
	// 	//var minutes       = Math.floor(minutesLeft/3600);
	// 	//var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
	// 	var minutes     = Math.floor(minutesLeft/60);
	// 	var remainingSeconds = seconds % 60;
	// 	function pad(n) {
	// 		return (n < 10 ? "0" + n : n);
	// 	}
	// 	document.getElementById("hours").innerHTML = pad(hours);
	// 	 document.getElementById("mins").innerHTML = pad(minutes);
	// 	 document.getElementById("sec").innerHTML = pad(remainingSeconds);
	// 	//document.getElementById('countdown').innerHTML = pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds)+' Hrs'
	// 	if (seconds == 0) {
	// 		clearInterval(countdownTimer);
	// 		document.getElementById("hours").innerHTML = "00";
	// 		document.getElementById("mins").innerHTML = "00";
	// 		document.getElementById("sec").innerHTML = "00";
	// 		} else {
	// 		seconds--;
	// 	}
	// }
	// var countdownTimer = setInterval('timer()', 990);



</script>

<!-- content section -->
<div class="content-sec mb-3">
<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-8">
						<div class="inner-banner-heading">Auction</div>
						<ul class="breadcum">
							<li><a href="../index.html">Home</a></li>
							<li><a href="#">Product Details</a></li>
						</ul>
					</div>
					{{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 countdown d-flex justify-content-end">
						<p><span id="hours"></span><span class="ltext">hrs</span></p>
					 	<p><span id="mins"></span><span class="ltext">min</span></p>
					 	<p><span id="sec"></span><span class="ltext">sec</span></p>
						</div>--}}
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="container">
		<div class="row">
			<div class="col-12  innergraybg">
                {{-- @foreach ($Product as $item) --}}
				<div class="left-content-sec ">
					<!-- heading section -->
					<div class="left-heading-sec d-flex justify-content-center">
						<div class="row col-12 d-flex justify-content-center">
							<div class="  col-md-12 col-lg-12 d-flex justify-content-center">
								@if ($TSeconds < 86400) 
								<p class="larg-heading " > Auction {{ \Carbon\Carbon::now('Europe/London')->addDays(-1)->format('Ymd')}} </p>
								@else 
								<p class="larg-heading " > Auction {{ \Carbon\Carbon::now('Europe/London')->format('Ymd')}} </p>
								@endif
							</div>
							<div class="  col-md-12 col-lg-12 d-flex justify-content-center">
								<p class="larg-heading d-flex justify-content-center" id="today_timer"></p>
							</div>
						</div>
						{{--<h2 class="larg-heading">{{$Product->product_name}}</h2> --}}
					</div>
					{{-- <div class="" id="success_message" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show"></div> --}}
					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-12 col-lg-6">
							<?php
										$images = json_decode($Product->image);
									?>
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner" role="listbox">
												<div class="carousel-item active" >
															<a title="Click to preview product images" data-toggle="modal" data-target=".bd-example-modal-xl" >
																<img class="d-block " src="{{asset($Product->feature_image)}}"  class="img-fluid mb-2" alt="{{asset($Product->feature_image)}}" style="width: 100%;"/>
															</a>
										        	</div>
												@foreach ($images as $index => $image)
										        	<div class="carousel-item " >
															<a title="Click to preview product images" data-toggle="modal" data-target=".bd-example-modal-xl" ><img class="d-block " src="{{asset($image->image)}}"  class="img-fluid mb-2" alt="{{asset($image->image)}}" style="width: 100%;"/></a>
										        	</div>
												@endforeach
										    </div>
										    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										        <span class="sr-only">Previous</span>
										    </a>
										    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										        <span class="carousel-control-next-icon" aria-hidden="true"></span>
										        <span class="sr-only">Next</span>
										    </a>
										</div>

							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-6">
								<div class="left-heading-sec mb-3 ">
									<h2 class="larg-heading">Biding</h2>
								</div>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12">
										<p class="bidprice {{ $Product->max_bid == null ? 'No Bid' : 'price'}}">{{ $Product->max_bid == null ? 'No Bid' : $Product->max_bid}}<span>Current Bid</span></p>
										<ul class="commonul">
											<li>Item ID <span>{{$Product->product_unique_id}}</span></li>
{{--											<li>Started  <span>{{$Product->start_price}}</span></li>--}}
											<li>Catalogue Number <span>{{$Product->cataloge_nrs}}  +{{$Product->catlogue_no}} </span></li>
											<li>Bids <span>{{$bidCount}}</span></li>
											<li>Country <span>{{$Product->name}}</span></li>
                                            <li>Year<span>{{$Product->year}}</span></li>
										</ul>
									</div>
									<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center">


											@if(Auth::guard('web')->user() == true)
											<p class="mt-4"><a   class="btn btn-subs-custm  bidnow" type="button" >Bid Now</a></p>
											@else
											<p class="mt-4"><a  href="{{route('user.login')}}" class="btn btn-subs-custm  " type="button" >Bid Now</a></p>
											@endif


										</div>
									</div>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4">
							<div class="aboutseller">
								<div class="row">
									<div class="deliveryarea pl-4">
										<div class="left-heading-sec mb-2 ">
											<h2 class="larg-heading">About Seller</h2>
										</div>
										<div class="row">
{{--											<div class="col-12 pl-4 ">--}}
{{--												<label>User Code :</label>  <span>{{$Product->username}}</span>--}}
{{--                                            </div>--}}
											<div class="col-12 pl-4">
												<label>Country :</label>	<span>{{$Product->name}}</span>
                                            </div>
											<div class="col-12 pl-4">
												<label>Product Category :</label> <span>{{$Product->category}}</span>
                                            </div>
											@if (!empty($item->Sub_Category))
											<div class="left-body-heading">Sub-Category :  <span>{{$item->Sub_Category}}</span> </div>
											@endif

											<input type="text" value="{{$Product->id}}" name="id" class="product_id form-control" hidden />
										</div>
									</div>

								</div>

							</div>
						</div>
							<div class="col-12 col-sm-12 col-md-8 col-lg-8">
									<div class="left-heading-sec mb-3 pl-2">
										<h2 class="larg-heading">Description</h2>
									</div>
									@foreach ($Features as $feature)
									<p class="text-justify pl-2"><input type="checkbox" checked/> {{ $feature->description}}</p>
									@endforeach
							</div>
					</div>


					<div class="row ">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pl-4">
							<div class="left-heading-sec mb-3 ">
								<h3>Seller Rating:
									<i class="fa {{ $Product->rating >= 1 ? 'fa-star' : ''}}"></i>
									<i class="fa {{ $Product->rating >= 2 ? 'fa-star' : ''}}"></i>
									<i class="fa {{ $Product->rating >= 3 ? 'fa-star' : ''}}"></i>
									<i class="fa {{ $Product->rating >= 4 ? 'fa-star' : ''}}"></i>
									<i class="fa {{ $Product->rating >= 5 ? 'fa-star' : ''}}"></i>
								</h3>
							</div>
						</div>
					</div>
					<div class="left-heading-sec d-flex justify-content-center mt-2 pl-4">
						<h2 class=" larg-heading">Seller Other Product's </h2>
					</div>
					<div class="left-content-sec">
						<div  id="style-1">
                            <div class="register-content-sec heightfull">
                                <div  id="style-1">

                                    <div class="card-body col-12">
                                        <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Image</th>
                                                <th>Country</th>
                                                <th>cat. + nr.</th>
                                                <th>item descr.</th>
                                                <th>itemnr.</th>
                                                <th>Year</th>
                                                <th>cat.price</th>
                                                <th>actual bid</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($SellerProduct as $item)
                                                @if ($Product->id != $item->id)
                                                <tr>
                                                    <td><a href=""><i class="fa fa-regular fa-heart"></i></a></td>
                                                    {{--                                            <td>{{$item->product_name}}</td>--}}
                                                    <td class="tdimg">
                                                        <a href="{{route('Bid.product', $item->id )}}">
                                                            <img  src="{{asset($item->feature_image)}}" alt="product_img"  style="width: 50%;">
                                                        </a>
                                                    </td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->cataloge_nrs}} + {{$item->catlogue_no}}</td>
                                                    <td class="tdimg">{{$item->description}}...</td>
                                                    {{--                                            <td><a href="{{route('admin.view.seller',$item->seller_id)  }}" target="_blank">--}}
                                                    {{--                                                    {{$item->first_name}} {{$item->last_name}}--}}
                                                    {{--                                                </a></td>--}}
                                                    <td>{{$item->product_unique_id}}</td>
                                                    <td>{{$item->year}}</td>
                                                    {{--                                            <td>{{$item->category}}</td>--}}
                                                    <td>{{$item->start_price}}</td>
                                                    <td>
                                                        @if (!empty($todayBids))
                                                            @foreach ($todayBids as $bidPt)
                                                                @if ($item->id == $bidPt->id )
                                                                    @if ($bidPt->user_id == $usr)
                                                                        @if($bidPt->amount == $item->max_bid || $bidPt->amount > $item->max_bid)
                                                                            <span style="color: green; font-size: 28px;" ><b>{{$bidPt->amount}}</b></span>
                                                                            @break
                                                                        @else
                                                                            <span style="color: red; font-size: 18px;" ><b> {{$item->max_bid}}</b></span>
                                                                            @break
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    @if ($loop->last)
                                                                        <b style="font-size: 18px;" > {{$item->max_bid}}</b>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <b style="font-size: 18px;" > {{$item->max_bid}}</b>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('Bid.product', $item->id )}}" class="btn btn-danger" title="Click here to view product details">Bid</a>
                                                    </td>
                                                    {{--                                            <td>{{$item->start_price}}</td>--}}



                                                </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

{{--							@foreach ($SellerProduct as $item)--}}
{{--							@if ($Product->id != $item->id)--}}

{{--						<div class="left-body-sec">--}}
{{--							<div class="left-sec-row row">--}}
{{--								<div class="col-12 col-sm-12 col-md-12  col-lg-4 col-xl-4" style="padding-left: 0px;">--}}
{{--									<div class="img-sec" >--}}
{{--										<a href="{{route('Bid.product', $item->id )}}">--}}
{{--											<img  src="{{asset($item->feature_image)}}" alt="product_img"  style="width: 100%;"/></a>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--								<div class="col-12 col-sm-12 col-md-12  col-lg-8 col-xl-8" style="padding-left: 0px;">--}}
{{--									<div class="img-rel-cont ">--}}
{{--										<div class="left-body-heading"><a href="{{route('Bid.product', $item->id )}}" title="Click here to view product details">{{$item->product_name}}</a></div>--}}

{{--											<div class="left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px" >Country : {{$item->name}}</div>--}}
{{--											<div class="left-body-heading col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px">Item number : {{$item->product_unique_id}}</div>--}}
{{--											<div class="left-body-heading">Category :  <span>{{$item->category}}</span> </div>--}}
{{--											@if (!empty($item->Sub_Category))--}}
{{--											<div class="left-body-heading">Sub-Category :  <span>{{$item->Sub_Category}}</span> </div>--}}
{{--											@endif--}}

{{--											@if (!empty($item->catalogue))--}}
{{--												<div class="left-body-heading">Cateloge Nr :  <span>{{$item->cataloge_nrs}} </span> </div>--}}
{{--											@endif--}}
{{--											<div class="left-body-heading">Cateloge number :  <span>{{$item->catlogue_no}}</span> </div>--}}
{{--											<div class="col-12">--}}
{{--												<div  class="row">--}}
{{--													<div class="left-body-heading col-lg-7 col-sm-12" style="padding-left: 0px" >Actual price : <b>US {{$item->start_price}}</b></div>--}}
{{--													<div class="left-body-heading col-lg-5 col-sm-12 " style="padding-left: 0px">--}}
{{--														@if (!empty($todayBids))--}}
{{--															@foreach ($todayBids as $bidPt)--}}
{{--																	@if ($item->id == $bidPt->id )--}}
{{--																		@if ($bidPt->user_id == $usr)--}}
{{--																			@if($bidPt->amount == $item->max_bid || $bidPt->amount > $item->max_bid)--}}
{{--																				<span style="color: green; font-size: 28px;" ><b>My Bid : {{$bidPt->amount}}</b></span>--}}
{{--																				@break--}}
{{--																			@else--}}
{{--																				<span style="color: red; font-size: 28px;" ><b>Bid : {{$item->max_bid}}</b></span>--}}
{{--																				@break--}}
{{--																			@endif--}}
{{--																		@endif--}}
{{--																	@else--}}
{{--																		@if ($loop->last)--}}
{{--																		<b style="font-size: 28px;" >Bid : {{$item->max_bid}}</b>--}}
{{--																		@endif--}}
{{--																	@endif--}}
{{--															@endforeach--}}
{{--														@else--}}
{{--															<b style="font-size: 28px;" >Bid : {{$item->max_bid}}</b>--}}
{{--														@endif--}}
{{--													</div>--}}
{{--												</div>--}}
{{--											</div>--}}
{{--											<div class="left-body-heading">Condition :  <span>{{$item->features}}</span> </div>--}}
{{--											<div class="left-body-heading">Seller :  <span>{{$item->username}}</span> </div>--}}
{{--											<div class="left-body-heading">--}}
{{--												Seller Rating:--}}
{{--												<i class="fa {{ $item->rating >= 1 ? 'fa-star' : ''}}"></i>--}}
{{--												<i class="fa {{ $item->rating >= 2 ? 'fa-star' : ''}}"></i>--}}
{{--												<i class="fa {{ $item->rating >= 3 ? 'fa-star' : ''}}"></i>--}}
{{--												<i class="fa {{ $item->rating >= 4 ? 'fa-star' : ''}}"></i>--}}
{{--												<i class="fa {{ $item->rating >= 5 ? 'fa-star' : ''}}"></i>--}}
{{--											</div>--}}
{{--											<div class="row-footer-sec" style="margin-top:0px;">--}}
{{--												<p style=" font-size: 21px;"><b>|</b> <a href="{{route('Bid.product', $item->id )}}" title="Click here to view product details"><span><i class="fa fa-image"></i></span> more images </a><b>|</b> <a href="{{route('seller.products', $item->seller_id)}}" title="Click here to view seller products"><span><i class="fa fa-ellipsis-h"></i></span> seller other items </a><b>|</b><a href="{{url('/chatify',$item->seller_id)}}"> <span><i class="fa fa-comments"></i></span> contact seller </a><b>|</b><a href="{{route('user.addWatchList', $item->id )}}" title="Click here to add product in wachlist"><span><i class="fa fa-heart"></i></span>&nbsp; wishlist</a><b>|</b> <span><i class="fa fa-info-circle"></i></span><b> additional info :</b> {{$item->description}}</p>--}}
{{--											</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}

{{--						</div>--}}
{{--							@endif--}}
{{--							@endforeach--}}
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
 <!-- Add  Modal -->
<div class="modal fade" id="BidModal" tabindex="0" role="dialog" aria-labelledby="BidModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  	<div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="BidModalCenterTitle">Please Enter Bid Amount</h5>

			</div>
			<div class="modal-body">
					<ul id="saveform_errlist"></ul>
					<ul id="success_message"></ul>

					<div class="form-group mb-3">
						<input type="number" class="bid form-control" placeholder="Bid Amount..."/>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary close_bid" data-dismiss="modal">Close</button>
			  <button type="submit" class="savebtn btn btn-primary">Bid</button>
			</div>
		</div>
	</div>
</div>


<style>
	.bd-example-modal-xl{
		margin-top: -100px
	}
</style>
<div class="modal fade bd-example-modal-xl"  role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
		<?php
			$images = json_decode($Product->image);
		?>
		<div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<a  data-toggle="modal" data-target=".bd-example-modal-xl" >
							<img class="d-block " src="{{asset($Product->feature_image)}}"  class="img-fluid mb-2" alt="{{asset($Product->feature_image)}}preview" style="width: 100%;"/>
						</a>
			        </div>

					@foreach ($images as $index => $image)
			        	<div class="carousel-item " >
								<a  data-toggle="modal" data-target=".bd-example-modal-xl" >
									<img class="d-block " src="{{asset($image->image)}}"  class="img-fluid mb-2" alt="{{asset($image->image)}}preview" style="width: 100%;"/>
									</a>
			        	</div>
					@endforeach
			    </div>
			    <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
			        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			        <span class="sr-only">Previous</span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
			        <span class="carousel-control-next-icon" aria-hidden="true"></span>
			        <span class="sr-only">Next</span>
			    </a>
			</div>
		</div>
    </div>
  </div>
</div>
		   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function () {
	//called when key is pressed in textbox
	$(document).on('click','.bidnow', function () {
		// .appendTo("body")
    	$('#BidModal').modal('show');

	});

	$(document).on('click','.savebtn',function (e) {
    e.preventDefault();
	var new_bid = $('.bid').val();
	alert('are you sure you want to bid $ '+new_bid+' !')

    var data = {
                'bid': new_bid,
				'product_id': $('.product_id').val(),
            }
			// console.log(data);
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

              $.ajax({
                type: 'POST',
                url: '/user/bid',
                data: data,
                dataType: 'json',
                success: function (response) {
					// console.log(response);

                  if(response.status == 400){
					$('#success_message').html("");
				  	$('#success_message').removeClass('alert alert-success');
                    $('#saveform_errlist').html("");
                    $('#saveform_errlist').addClass('alert alert-danger');
                      $.each(response.errors, function (key, err_value) {
                    $('#saveform_errlist').append('<li>' + err_value + '</li>');
                    });

                }
				else if(response.status == 201){
					$('#success_message').html("");
				  	$('#success_message').removeClass('alert alert-success');
					$('#saveform_errlist').html("");
                    $('#saveform_errlist').addClass('alert alert-danger');
                    $('#saveform_errlist').append('<li>' + response.errors + '</li>');

				}
                else{
				  $('#saveform_errlist').html("");
                  $('#saveform_errlist').removeClass('alert alert-danger');
                  $('#BidModal').find('input').val('');
                  $('#saveform_errlist').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                //   $('#BidModal').modal('hide');
                  $('#BidModal').find('input').val('');
                }
                }
              });
  });

  //  End Create Model Part ans store to database


  // Start Add Model Close Button

  $(document).on('click','.close_bid', function () {
                  $('#saveform_errlist').html("");
				  $('#saveform_errlist').removeClass('alert alert-danger');
				  $('#success_message').html("");
				  $('#success_message').removeClass('alert alert-success');
                  $('#BidModal').find('input').val('');
				  location.reload(true);
    });
});
</script>

<div class="modal" id="myDialogbox"   >
	<div class="modal-dialog " >
	  	<div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title">alert</h5>

			</div>
			<div class="modal-body">
					<span>{{Session::get('asuccess')}}</span>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary bid_close_btn" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	   <!--End -wishlistModal -->
<script>
	var msg = '{{Session::get('asuccess')}}';
	var exist = '{{Session::has('asuccess')}}';
	if(exist){
		$('#myDialogbox').show();
	}

	$(document).on('click','.bid_close_btn', function () {
		// .appendTo("body")
    	$('#myDialogbox').hide();


	});
</script>
@include('48-h/footer')


<script>
	// Set the date we're counting down to

	var tdistance = <?php echo json_encode($TSeconds); ?>

	function ttimer() {
		var days        = Math.floor(tdistance/24/60/60);
		var hoursLeft   = Math.floor((tdistance) - (days*86400));
		var hours_m       = Math.floor(hoursLeft/3600);
		var minutesLeft_m = Math.floor((hoursLeft) - (hours_m*3600));
		var minutes_m     = Math.floor(minutesLeft_m/60);
		var remainingSeconds_m = tdistance % 60;

		function pad(n) {
			return (n < 10 ? "0" + n : n);
		}
		if(tdistance > 1){
			document.getElementById("today_timer").innerHTML ="Time left: "+ pad(days) + "d : "+ pad(hours_m) + "h : "+ pad(minutes_m) + "m : " + pad(remainingSeconds_m) + "s ";
			if (tdistance == 0) {
				clearInterval(TcountdownTimer_m);
				document.getElementById("today_timer").innerHTML ="Time left: "+ pad(days) + "d : "+  pad(hours_m) + "h : " + pad(minutes_m) + "m : " + pad(remainingSeconds_m) + "s ";
				} else {
				tdistance--;
			}
		}
	}


	var TcountdownTimer_m = setInterval('ttimer()', 990);

</script>

