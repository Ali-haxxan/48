@include('48-h/head')
@include('48-h/header')
<div class="content-sec">
	<div class="container">
		<div class="row">
			
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="left-heading-sec d-flex justify-content-center">
					<h2 class="larg-heading">Watchlist Products </h2>
				</div>
				<div class="register-content-sec heightfull">
					<div  id="style-1">
                         
						@foreach ($TodayAuctionProduct as $item)
						<div class="left-body-sec">
							<div class="left-sec-row row">
								<div class="col-12 col-sm-12 col-md-12  col-lg-4 col-xl-4" style="padding-left: 0px;">
									<div class="img-sec" >
										<a href="{{route('Bid.product', $item->id )}}">
											<img  src="{{asset($item->feature_image)}}" alt="product_img"  style="width: 100%;"/></a>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12  col-lg-8 col-xl-8" style="padding-left: 0px;">
									<div class="img-rel-cont ">
										<div class="left-body-heading"><a href="{{route('Bid.product', $item->id )}}" title="Click here to view product details">{{$item->product_name}}</a></div>
											<div class="left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px" >Country : {{$item->name}}</div>
											<div class="left-body-heading col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px">Item number : {{$item->product_unique_id}}</div>
											<div class="left-body-heading">Category :  <span>{{$item->category}}</span> </div>
											@if (!empty($item->Sub_Category))
											<div class="left-body-heading">Sub-Category :  <span>{{$item->Sub_Category}}</span> </div>
											@endif

											@if (!empty($item->catalogue))
												<div class="left-body-heading">Cateloge Nr :  <span>{{$item->cataloge_nrs}} </span> </div>
											@endif
											<div class="left-body-heading">Cateloge number :  <span>{{$item->catlogue_no}}</span> </div>
											<div class="col-12">
												<div  class="row">
													<div class="left-body-heading left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding-left: 0px" >Actual price : <b>US {{$item->start_price}}</b></div>
													<div class="left-body-heading  left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5" style="padding-left: 0px">
														@if (!empty($todayBids))
															@foreach ($todayBids as $bidPt)
																	@if ($item->id == $bidPt->id )
																		@if ($bidPt->user_id == $usr)
																			@if($bidPt->amount == $item->max_bid || $bidPt->amount > $item->max_bid)
																				<span style="color: green; font-size: 28px;" ><b>My Bid : {{$bidPt->amount}}</b></span>
																				@break
																			@else
																				<span style="color: red; font-size: 28px;" ><b>Bid : {{$item->max_bid}}</b></span>
																				@break
																			@endif
																		@endif
																	@else
																		@if ($loop->last)
																		<b style="font-size: 28px;" >Bid : {{$item->max_bid}}</b>
																		@endif
																	@endif
															@endforeach
														@else
															<b style="font-size: 28px;" >Bid : {{$item->max_bid}}</b>
														@endif
													</div>
												</div>
											</div>
											<div class="left-body-heading">Condition :  <span>{{$item->features}}</span> </div>

											<div class="left-body-heading">Seller :  <span>{{$item->username}}</span> </div>
											<div class="left-body-heading">
												Seller Rating: 
												<i class="fa {{ $item->rating >= 1 ? 'fa-star' : ''}}"></i>
												<i class="fa {{ $item->rating >= 2 ? 'fa-star' : ''}}"></i>
												<i class="fa {{ $item->rating >= 3 ? 'fa-star' : ''}}"></i>
												<i class="fa {{ $item->rating >= 4 ? 'fa-star' : ''}}"></i>
												<i class="fa {{ $item->rating >= 5 ? 'fa-star' : ''}}"></i>
											</div>
											<div class="row-footer-sec" style="margin-top:0px;">
													<p style=" font-size: 21px;"><b>|</b> <a href="{{route('Bid.product', $item->id )}}" title="Click here to view product details"><span><i class="fa fa-image"></i></span> more images </a><b>|</b> <a href="{{route('seller.products', $item->seller_id)}}" title="Click here to view seller products"><span><i class="fa fa-ellipsis-h"></i></span> seller other items </a><b>|</b><a href="{{url('/chatify',$item->seller_id)}}"> <span><i class="fa fa-comments"></i></span> contact seller </a><b>|</b><a href="{{route('user.addWatchList', $item->id )}}" title="Click here to add product in wachlist"><span><i class="fa fa-heart"></i></span>&nbsp; wishlist</a><b>|</b> <span><i class="fa fa-info-circle"></i></span><b> additional info :</b> {{$item->description}}</p>
											</div>
											{{-- <h1>{{$item->id}}</h1> --}}

									</div>
								</div>
							</div>
							
						</div>
						@endforeach
					</div>
				</div>
			</div>
            
			<div class="blanksection"></div>
			<div class="col-12 col-sm-3 col-md-3 pr-md-0 ">
			</div>
		</div>
	</div>
@include('48-h/footer')

</div>

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
			  <button type="button" class="btn btn-secondary close_bid" data-dismiss="modal">Close</button>
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
	
	$(document).on('click','.close_bid', function () {
		// .appendTo("body")
    	$('#myDialogbox').hide();


	});
</script>
