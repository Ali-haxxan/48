<!doctype html>
<html>
	
<!-- Mirrored from 48-h.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
@include('48-h/head')
	<script>var baseURL = 'index.html';</script>
		<body class="bodybg">
            @include('48-h/header')

{{-- ////////////////////////////  header end ///////////////////// --}}










<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Registration</div>
				<ul class="breadcum">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="#">Registration</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- content section -->
<!-- message area-->
<!-- content section -->
<div class="content-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-9 pt-0 pl-md-0 ">
				<div class="register-content-sec">
					<!-- heading section -->
					<div class="left-heading-sec">
						<h2 class="larg-heading">Register <span class="small-red-heading">(Start Bidding)</span></h2>
					</div>

					
						<form action="{{route('Register')}}" enctype="multipart/form-data" method="post" onsubmit="validatePassword();" id="userreg">
							@csrf
							@if (Session::get('success'))
							<div class="alert alert-success col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
								{{ Session::get('success') }}
							</div>
						
							@endif
							@if (Session::get('fail'))
								<div class="alert alert-danger col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
									{{ Session::get('fail') }}
								</div> 
							
							@endif
							<div class="Register-form-sec pt-0">
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group custm-radio pt-1">
											<span class="custm-radio-label">Register as :</span>
											<input class="userTypeCls" {{ old('user_type') == "1" ? 'checked' : '' }} type="radio" value="1" id="buyer" name="user_type"  >
											<label for="buyer">Buyer</label>
											<input  class="userTypeCls" {{ old('user_type') == "2" ? 'checked' : '' }} type="radio" value="2" id="seller" name="user_type" >
											<label for="seller">Seller</label>
											<span class="text-danger"> @error('user_type'){{$message}}@enderror</span>
		
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group custm-radio pt-1">
											<span class="custm-radio-label">Gender :</span>
											<input type="radio" {{ old('gender') == "male" ? 'checked' : '' }} value="male" id="male"name="gender" >
											<label for="male">Male</label>
											<input type="radio" {{ old('gender') == "female" ? 'checked' : '' }} value="female" id="female" name="gender"  >
											<label for="female">Female</label>
											<span class="text-danger"> @error('gender'){{$message}}@enderror</span>
										</div>
									</div>
									{{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="wallet_shipments" style="display:none;">
										<div class="form-group custm-radio pt-1">
											<span class="custm-radio-label">Are you accepting wallet-shipments ?</span>
											<input type="radio" value="accept" {{ old('wallet_shipment') == "walletaccept" ? 'checked' : '' }} id="walletaccept" name="wallet_shipment"   >
											<label for="walletaccept">Accept</label>
											<input type="radio" value="not accept" {{ old('wallet_shipment') == "not accept" ? 'checked' : '' }} id="walletnotaccept" name="wallet_shipment"   ><label for="walletnotaccept">Not Accept</label>
											<span class="text-danger"> @error('wallet_shipment'){{$message}}@enderror</span>
										</div>
									</div>			 --}}
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control custm-input" id="first_name" name="first_name" value="{{old('first_name')}}"  placeholder="First Name " />
											<span class="text-danger"> @error('first_name'){{$message}}@enderror</span>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control custm-input" id="last_name" name="last_name" value="{{old('last_name')}}"  placeholder="Last Name" />
											<span class="text-danger"> @error('last_name'){{$message}}@enderror</span>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="email" id="email" name="email" onkeypress="return RestrictSpace();" value="{{old('email')}}" class="form-control custm-input" placeholder="E-mail Address" />
											<span class="text-danger"> @error('email'){{$message}}@enderror</span>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="text" class="form-control custm-input numberOnly" id="phone" name="phone" value="{{old('phone')}}"  placeholder="Phone: 01234567890" />
											<span class="text-danger"> @error('phone'){{$message}}@enderror</span>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group">
											<textarea  class="form-control custm-input" id="address" name="address" rows="4" cols="50" placeholder="Address" >{{old('address') }}</textarea>
											<span class="text-danger"> @error('address'){{$message}}@enderror</span>
										</div>
									</div>
									
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input class="form-control custm-input" name="city" id="city" placeholder="City" value="{{old('city')}}"/>
											<span class="text-danger"> @error('city'){{$message}}@enderror</span>
										</div>
									</div>
									
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input class="form-control custm-input" name="state" id="state" placeholder="State/ Province" value="{{old('state')}}"  />
											<span class="text-danger"> @error('state'){{$message}}@enderror</span>
										</div>
									</div>
									
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="number" class="form-control custm-input numberOnly" id="postal_code" name="postal_code" value="{{old('postal_code')}}" placeholder="Postal code: 01234" />
											<span class="text-danger"> @error('postal_code'){{$message}}@enderror</span>
										</div>
									</div>
									
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											{{-- <input type="text" class="form-control custm-input" id="ref_country_id" name="country" value="{{old('country')}}"   placeholder="Country Name " /> --}}
											<select class="form-control custm-input" id="ref_country_id" name="country" style="border-radius: 150px" >
												<option value="">Select Country</option>
												@foreach ($countries as $country)

												<option {{ old('country') == "$country->id" ? 'selected="selected"' : '' }} value="{{$country->id}}">{{$country->name}}</option>
												@endforeach
												
											</select>
											<span class="text-danger"> @error('country'){{$message}}@enderror</span> 
										</div>
									</div>						
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="password" class="form-control custm-input" id="user_password" name="user_password" value="{{old('user_passwordd')}}"  placeholder="Choose Password " />
											<span class="text-danger"> @error('user_password'){{$message}}@enderror</span> 
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="password" class="form-control custm-input" id="confirm_password" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Confirm Password" />
											<span class="text-danger"> @error('confirm_password'){{$message}}@enderror</span> 
										</div>
									</div>							

									<div class="col-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group cutum-check">
											<input type="checkbox" id="accept" value="accept" {{ old('term_condition') == "accept" ? 'checked' : '' }} name="term_condition" >
											<label for="accept"><span class="custm-radio-label">Accept terms & conditions</span></label>
											<span class="text-danger"> @error('term_condition'){{$message}}@enderror</span> 
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
										<div class="form-group">
											<input type="Submit" class="btn-subs-custm form-control" value="Create Account" onclick="return validation();" style="border-radius: 150px"/>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
									<a title="Click here to Login" href="{{route('user.login')}}" style="color: black"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a>
									
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12">
									<div class="note">Note</div>
									<p class="note-content">With your registration, you declare to have read, understand and accept our terms and conditions as written on this website.
										Confirmation of your registration will be sent with your usercode to your email address. 
									Data  will never be shared with third persons *.</p>
								</div>
							</div>
						</div>
					</form>
			</div>
		</div>
	</div>
	
</div>
<div class="mb-4"></div>
	@include('48-h/footer')
</div>	
<script>
    function validations()
	{
		if($('input[type=radio][name=user_type]:checked').length == 0)
		{
            $('input[type=radio]').css('border-color','green');
			alert("Please select Register as Buyer or Seller!");
			return false;
		}
		
		return true;
	}
</script>
<script type="text/javascript" src="{{asset('48h/assets/site/main/js/sha.js')}}"></script>
<script type="text/javascript">
	
	// $(document).ready(function() {
		
	// 	$('.userTypeCls').click(function() {
	// 		var userTypeValue = $("input[name='user_type']:checked").val();
	// 		if(userTypeValue==2) {
	// 			$('#wallet_shipments').show();
	// 			}else {
	// 			$('#wallet_shipments').hide();
	// 		}
			
	// 	})
		
	// });
	function RestrictSpace() 
	{
		if (event.keyCode == 32) 
		{
			event.returnValue = false;
			return false;
		}
	}
	
	function validatePassword() 
	{
		var user_password = document.getElementById("user_password").value;
		var confirmPassword = document.getElementById("confirm_password").value;
		if((user_password == '') && (confirmPassword ==''))
		{
			
			("#user_password").val('');
			("#confirm_password").val('');
			return false;
		}
		var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,50}$/;
		
		/*if (!regex.test(user_password)) {
			alert("Password field must be at least one lowercase letter,one Upperase, one number,one special character and minium length 8 character.");
			return false;
		}*/
		var confirmPassword = document.getElementById("confirm_password").value;
		if (user_password != confirmPassword) {
			alert("Choose Password and Confirm Password did not match. Please try again");
			return false;
		}
		
		// var secret = $('#user_password').val();
		// var shaObj = new jsSHA("SHA-1", "TEXT");
		// shaObj.update(secret);   
		// var hash = shaObj.getHash("HEX");
		// $('#user_password').val(hash);	
		
		// var secret1 = $('#confirm_password').val();
		// var shaObj1 = new jsSHA("SHA-1", "TEXT");
		// shaObj1.update(secret1);   
		// var hash1 = shaObj1.getHash("HEX");
		// $('#confirm_password').val(hash1);	
		
		return true;
		
	}
	
	$(function() {
		$('#email').on('keypress', function(e) {
			if (e.which == 32)
			return false;
		});
	});
	$(document).ready(function () {
		//called when key is pressed in textbox
		$(".numberOnly").keypress(function (e) {
			
			//if the letter is not digit then display error and don't type anything
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				//display error message
				//$("#errmsg").html("Digits Only").show().fadeOut("slow");
				return false;
			}
		});
		
	});
	function validation()
	{
		if($('input[type=radio][name=gender]:checked').length == 0)
		{
			$('input[type=radio]').css('border-color','green');
			alert("Please select gender");
			return false;
		}
		if($('input[type=radio][name=user_type]:checked').length == 0)
		{
			alert("Please select Register as Buyer,Seller");
			return false;
		}
		// var userTypeValue = $("input[name='user_type']:checked").val();
		// if(userTypeValue==2) {
		// 	if($('input[type=radio][name=wallet_shipment]:checked').length == 0)
		// 	{
		// 		alert("Please select Are you accepting wallet-shipments?");
		// 		return false;
		// 	}
			
			
		// }
		
		
		
		if($('input[type=checkbox][name=term_condition]:checked').length == 0)
		{
			alert("Please accept terms & conditions of 48hrs  :");
			return false;
		}
		
		
		return true;
		
	}
	
	</script>		


<!-- footer section -->
<script>
	$('ul.nav li.dropdown').hover(function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});
</script>

<script>
	jQuery(document).ready(function() {
		var owl = jQuery('.owl-carousel');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 15,
			autoplay: true,
			autoplayTimeout: 3000, 
			autoplayHoverPause: true,
			nav:true,
			responsive: {
				0: {
					items: 1
				}
				
				
			}
		});
		<!-- service carousel -->
		var owl = jQuery('#servicecarousel');
		owl.owlCarousel({
			items: 3,
			loop: true,
			margin: 5,
			autoplay: false,
			autoplayTimeout: 3000, 
			autoplayHoverPause: true,
			nav:false,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1199: { 
					items: 3
				}
			}
		});
	});
	
</script>
<script>
	$(document).ready(function() {
		var paused = 0;
		$('#myCarousel').carousel({
			interval:3000
		})
		$('#toggleCarousel').click(function() {
			var state = (paused) ? 'cycle' : 'pause';
			paused = (paused) ? 0 : 1;
			$('#myCarousel').carousel(state);
			$(this).find('i').toggleClass('fa-play fa-pause');
		});
	});
	
</script>
<script>
	$(document).ready(function () {
										});
	</script>
</body>

<!-- Mirrored from 48-h.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:24 GMT -->
</html>