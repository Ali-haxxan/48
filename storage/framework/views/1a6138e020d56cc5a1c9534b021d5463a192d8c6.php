<!doctype html>
<html>
	
<!-- Mirrored from 48-h.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
		<body class="bodybg">
 <?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Sign In</div>
				<ul class="breadcum">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Sign In</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- content section -->
<div class="content-sec ">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="register-content-sec"> 
					<!-- heading section -->
					<div class="left-heading-sec">
						<h2 class="larg-heading">Admin Sign In <span class="small-red-heading">(Start Bidding)</span></h2>
					</div>
						<div class="login-form-sec">
                    	    <div class="row">
                    	        <div class="col-12 col-sm-6 col-md-6">
                    	            <div class="form-group custm-radio pt-1">
                    	            </div>
                    	        </div>
                    	    </div>
                    	</div>
                    <div>
                        <form method="post" action="<?php echo e(route('admin.check')); ?>" autocomplete="off"        enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <?php if(Session::get('success')): ?>
                                <div class="alert alert-success" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                                    <?php echo e(Session::get('success')); ?>

                                </div>
                            
                            <?php endif; ?>
                            <?php if(Session::get('fail')): ?>
                                <div class="alert alert-danger" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                                    <?php echo e(Session::get('fail')); ?>

                                </div> 
                            
                            <?php endif; ?>
							<div class="row">
								<div class="col-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input class="form-control custm-input" name="email" id="email" placeholder="User Name (Email Id)" type="email" />
                                        <span class="text-danger"> <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
									</div>
								</div>
								<div class="col-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input class="form-control custm-input" name="password" id="user_password" placeholder="Password" type="password" />
                                        <span class="text-danger"> <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
									</div>
								</div>
								
								
								<div class="col-12 col-sm-12 col-md-12">
									<a title="Click here to frogot password" href="#" class="forgotpassword text-underline">Forgot Password</a>
								</div>
								<div class="col-6 col-sm-6 col-md-6">
									<label>&nbsp;</label>
									<div class="form-group">
										<input type="submit" value="Login" id="register-submit" class="btn-subs-custm form-control custombtn"  style="border-radius: 150px"/>
									</div>
								</div>
								
							</div>
						</form>
                    </div>
                    	
                        
						
				</div>
					<!-- heading section --> 
				</div>
			</div>
			
		</div>
		<div class="mb-4"></div>
		<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	
</div>



<script type="text/javascript" src="<?php echo e(asset('48h/assets/site/main/js/sha.js')); ?>"></script>
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
</html><?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/admins/auth/login.blade.php ENDPATH**/ ?>