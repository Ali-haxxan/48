@include('48-h/head')
@include('48-h/header')
<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Forgot Password</div>
				<ul class="breadcum">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Forgot Password</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- content section -->
<div class="content-sec mb-3">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-9 pt-0 pl-md-0 ">
				<div class="register-content-sec"> 
					<!-- heading section -->
					<div class="left-heading-sec">
						<h2 class="larg-heading">Forgot Password</h2>
					</div>
					<div class="login-form-sec">
						
						<form action="{{route('password.email')}}" enctype="multipart/form-data" method="post">
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
							@if (Session::get('status'))
                                <div class="alert alert-success col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                                    {{ Session::get('status') }}
                                </div>
                            
                            @endif
                            @if (Session::get('email'))
                                <div class="alert alert-danger col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                                    {{ Session::get('email') }}
                                </div> 
                            
                            @endif
							{{-- <div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-6">
									<div class="form-group custm-radio pt-1">
										<span class="custm-radio-label">User as:</span>
										<input class="user_type" type="radio" value="1" id="buyer" name="user_type" >
										<label for="buyer">Buyer</label>
										<input  class="user_type"  type="radio" value="2" id="seller" name="user_type" >
										<label for="seller">Seller</label>
										<span class="text-danger"> @error('user_type'){{$message}}@enderror</span>
									</div>
								</div>
							</div> --}}
							<div class="row">
								<div class="col-12">
									<div class="form-group col-12 col-sm-12 col-md-12 col-lg-9">
										<input class="form-control custm-input" name="email" id="email" placeholder="User Name (Email Id)" type="email" />
                                        <span class="text-danger"> @error('email'){{$message}}@enderror</span>
									</div>
								</div>
								<div class="col-12">
									<label>&nbsp;</label>
									<div class="form-group col-12 col-sm-12 col-md-12 col-lg-6">
										<input type="submit" value="Reset Password" id="register-submit" class="btn-subs-custm form-control custombtn"  style="border-radius: 150px"/>
									</div>
								</div>
							</div>
						</form>
						
					</div>
					<!-- heading section --> 
				</div>
			</div>
			<div class="col-12 col-sm-3 col-md-3 pr-md-0 "> 
				<!-- tata sky add -->
<!--										<div class="advertise">-->
<!--							<img src="assets/site/main/advertise/1569845067_secondad.png" alt="Solution of Outstanding results" />-->
<!--						</div>-->
										<!-- tata sky add --> 
			</div>
		</div>
	</div>
</div>

@include('48-h/footer')