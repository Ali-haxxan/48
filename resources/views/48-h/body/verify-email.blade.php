@include('48-h/head')
@include('48-h/header')
<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Verify Email</div>
				<ul class="breadcum">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="#">Verify Email</a></li>
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
						<h2 class="larg-heading">Verify Email</h2>
					</div>
					<div class="login-form-sec">
						
						<form action="{{ route('verification.resend') }}" enctype="multipart/form-data" method="post">
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
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-6">
									<p>Verify Your Email Address</p> 
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group col-12 col-sm-12 col-md-12 col-lg-9">
										<p>Before proceeding, please check your email for a verification link. If you did not receive the email,</p>
									</div>
								</div>
								<div class="col-12">
									<label>&nbsp;</label>
									<div class="form-group col-12 col-sm-12 col-md-12 col-lg-6">
										<input type="submit" value="Click Here For Another Request" id="register-submit" class="btn-subs-custm form-control custombtn"  style="border-radius: 150px"/>
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