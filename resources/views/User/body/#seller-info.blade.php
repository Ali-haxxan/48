@include('48-h/head')
@include('48-h/header')
<div class="content-sec">
	<div class="container">
		<div class="row">
			
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="left-heading-sec d-flex justify-content-center">
					<h2 class="larg-heading">Seller Info</h2>
				</div>
				<div class="register-content-sec heightfull">
					<div  id="style-1">
						@foreach ($SellerInfo as $item)
						<div class="left-body-sec">
							<div class="left-sec-row row">
								<div class="col-12 col-sm-12 col-md-12  col-lg-8 col-xl-8" style="padding-left: 0px;">
									<div class="img-rel-cont ">
										<div class="left-body-heading">Gender :  <span>{{$item->gender}}</span> </div>
										<div class="left-body-heading">Wallet Shipment :  <span>{{$item->wallet_shipment}} </span> </div>
										<div class="left-body-heading">First Name :  <span>{{$item->first_name}}</span></div>
										<div class="left-body-heading">Last Name :  <span>{{$item->last_name}}</span> </div>
										<div class="left-body-heading">username :  <span>{{$item->username}}</span> </div>
										<div class="left-body-heading">Email :  <span>{{$item->email}}</span> </div>
										<div class="left-body-heading">Phone :  <span>{{$item->phone}}</span> </div>
										<div class="left-body-heading">Address :  <span>{{$item->address}}</span> </div>
										<div class="left-body-heading">City :  <span>{{$item->city}}</span> </div>
										<div class="left-body-heading">State :  <span>{{$item->state}}</span> </div>
										<div class="left-body-heading">Postal Code:  <span>{{$item->postal_code}}</span> </div>
										<div class="left-body-heading">Country :  <span>{{$item->country}}</span> </div>

										<div class="left-body-heading">
											Seller Rating: 
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-3 col-md-3 pr-md-0 ">
				<!-- tata sky add -->
									<div class="advertise">
						<img src="{{asset('48h/assets/site/main/advertise/1569845067_secondad.png')}}" alt="Solution of Outstanding results" />
					</div>
								<!-- tata sky add -->
			</div>
		</div>
	</div>
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
			  <button type="button" class="btn btn-secondary bid_close_btn" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	   <!--End - watchlist Modal -->
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