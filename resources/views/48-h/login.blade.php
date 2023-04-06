<!doctype html>
<html>
	
<!-- Mirrored from 48-h.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
@include('48-h/head')
	{{-- <script>var baseURL = 'index.html';</script> --}}
		<body class="bodybg">
 @include('48-h/header')

<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Sign In</div>
				<ul class="breadcum">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="#">Sign In</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- content section -->
<div class="content-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-9 pt-0 pl-md-0 ">
				<div class="register-content-sec"> 
					<!-- heading section -->
					<div class="left-heading-sec">
						<h2 class="larg-heading">Sign In <span class="small-red-heading">(Start Bidding)</span></h2>
					</div>
					{{-- <div class="login-form-sec">
                        
                    </div> --}}
                    <div>
                        <form method="post" action="{{route('check')}}" autocomplete="off"        enctype="multipart/form-data" >
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
							@if (Session::get('info'))
                                <div class="alert alert-info col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                                    {{ Session::get('info') }}
                                </div>
                            
                            @endif
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-6">
									<div class="form-group custm-radio pt-1">
										<span class="custm-radio-label">Login as :</span>
										<input class="user_type" type="radio" {{ old('user_type') == 1 ? 'checked' : ''}} value="1" id="buyer" name="user_type" >
										<label for="buyer">Buyer</label>
										<input  class="user_type"  type="radio" {{ old('user_type') == 2 ? 'checked' : ''}} value="2" id="seller" name="user_type" >
										<label for="seller">Seller</label>
										<span class="text-danger"> @error('user_type'){{$message}}@enderror</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-6">
									<div class="form-group">
										<input class="form-control custm-input" name="email" id="email" placeholder="User Name (Email Id)" value="{{session::get('verifiedEmail') ?session::get('verifiedEmail') : old('email')}}" type="email" />
                                        <span class="text-danger"> @error('email'){{$message}}@enderror</span>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-6">
									<div class="form-group">
										<input class="form-control custm-input" name="password" id="user_password" value="{{old('password')}}" placeholder="Password" type="password" />
                                        <span class="text-danger"> @error('password'){{$message}}@enderror</span>
									</div>
								</div>
								{{-- <div class="col-6 col-sm-6 col-md-6">
									<label>Confirm : I’m not a robot</label>
									<div class="capcha-sec catchaimg">
										<img id="captid" src="{{asset('48h/home/getCaptcha991a.png?_CAPTCHA&amp;t=0.03011300+1645213910')}}" alt="captcha">
										<a href="javascript:void(0);" class="reload-captcha"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></a>
										<input type="text" class="custm-input form-control" required="true" id="captchatext" name="captchatext" placeholder="Write the text here" autocomplete="off">
									</div>	
								</div> --}}
								
								<div class="col-12 col-sm-12 col-md-12 col-lg-12">
									<a title="Click here to frogot password" href="{{route('forgotPassword')}}" class="forgotpassword text-underline">Forgot Password</a>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-6">
									<label>&nbsp;</label>
									<div class="form-group">
										<input type="submit" value="Login" id="register-submit" class="btn-subs-custm form-control custombtn" onclick="return validation();" style="border-radius: 150px"/>
									</div>
								</div>
								
							</div>
						</form>
						
                            
                    </div>
                    
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							{{-- <a href="{{ url('auth/google') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
							<svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">                        
							<path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/>                        
							<path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/>                        <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/>                        <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/>                    
							</svg>
							<span>Login with Google</span>                
							</a>             --}}
							{{-- <div class="flex items-center justify-end mt-4">

								<a href="{{ url('auth/google') }}">
				
									<img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
				
								</a>
				
							</div> --}}
						</div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-right">
                            <a title="Click here to Registered" href="{{ route('register.page') }}" class="registertext text-underline">Registered Here</a>
                            
                        </div>
                    </div>	
                        
						
					</div>
					<!-- heading section --> 
				</div>
			</div>
			
		</div>
		<div class=" mb-4"></div>
		@include('48-h/footer')
	</div>
</div>
{{-- //////////////// select user script ////////// --}}
<script>
  function validations()
	{
		if($('input[type=radio][name=user_type]:checked').length == 0)
		{
            $('input[type=radio]').style('border-color','green');
			alert("Please select Register as Buyer or Seller!");
			return false;
		}
		
		return true;
	}
</script>
<script type="text/javascript" src="{{asset('48h/assets/site/main/js/sha.js')}}"></script>
<script type="text/javascript">
	var salt = 'g3e8z9f5';
	var exp = /((?=.*\d)(?=.*[a-z])(?=.*[@#$%]).{6,15})/;
	
	function getPass()
	{
		var secret = $('#user_password').val();
		var shaObj = new jsSHA("SHA-1", "TEXT");
		shaObj.update(secret); 
		var hashPass = shaObj.getHash("HEX");
		var shaObj1 = new jsSHA("SHA-1", "TEXT");
		shaObj1.update(hashPass+salt);   
		var hashSalt = shaObj1.getHash("HEX");
		$('#user_password').val(hashSalt);	
		
		
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