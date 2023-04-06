<footer>
	<div class="container-fluid">
		<div class="row foot-bg" >
			<div class="col-12 col-sm-6 col-md-4 col-lg-2">
				<div class="48-img"><img src="<?php echo e(asset('logo/'.$settings->logo)); ?>" alt="48-logo" class="img-fluid"></div>
				<ul class="address-details">
					<li><span class="font-icon"><i class="fa fa-map-marker"></i></span>0123  Main Road, New City, London </li>
					<li><span class="font-icon"><i class="fa fa-phone"></i></span>(000) 2345 - 6789</li>
					<li><span class="font-icon"><i class="fa fa-envelope"></i></span> Contact Us</li>
				</ul>
				<div class="invitefriend"><a href="#"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Invite a Friend</a></div>
			</div>

			<div class="col-6 col-sm-6 col-md-4 col-lg-2">
				<div class="sitemap-box">
					<h6>SiteMap</h6>
					<ul>
						    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
						    <li><a href="<?php echo e(url('/aboutus')); ?>">About Us</a></li>
							<li><a href="<?php echo e(url('/contact-us')); ?>">Contact Us</a></li>
							<li><a href="<?php echo e(url('/how-it-works')); ?>">How it works</a></li>
							<li><a href="<?php echo e(url('/Expl-Abbrev')); ?>">Expl. Abbrev.</a></li>
							<li><a href="<?php echo e(url('/frequently-ask-questions')); ?>">FAQ</a></li>
							<li><a href="<?php echo e(url('/register')); ?>">Registration</a></li>
							<?php if(Auth::guard('seller')->user() == true ): ?>
							<li><a href="<?php echo e(url('/seller/home')); ?>">My 4<sup><b>8</sup>-</b>h account</a></li>
							<?php else: ?>
							<li><a href="<?php echo e(url('/user/home')); ?>">My 4<sup><b>8</sup>-</b>h account</a></li>
							<?php endif; ?>
					</ul>
				</div>
			</div>
            <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                <div class="sitemap-box">
                    <h6>Category Abbreviation</h6>
                    <ul>
                        <li><a target="_blank" href="<?php echo e(asset('cat_doc/48-h_Numis_Abbrev_eng.pdf')); ?>"> Numismatic</a></li>
                        <li><a target="_blank" href="<?php echo e(asset('cat_doc/48-h_Philatelic_abbreviations.pdf')); ?>">Philatelic</a></li>

                        <li><a target="_blank" href="<?php echo e(asset('cat_doc/48-h_Miscelanous_Abbrev.pdf')); ?>">Miscelanous</a></li>

                    </ul>
                </div>
            </div>


            <div class="col-6 col-sm-6 col-md-4 col-lg-2">
				<div class="sitemap-box">
					<h6>External Links</h6>
					<ul>
						<li><a target="_blank" href="http://fair-tradedeal.com/">fair-tradedeal.com</a></li>
						<li><a target="_blank" href="http://fair-trade.org/">fair-trade.org </a></li>
						<li><a target="_blank" href="http://micro-startup.com/">micro-startup.com</a></li>
						<li><a target="_blank" href="http://room-agent.com/cgi-sys/suspendedpage.cgi">room-agent.com </a></li>
						<li><a target="_blank" href="http://pabaq.com/">pabaq.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-4 col-lg-2">
				<div class="sitemap-box">
					<h6>Social Media</h6>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="social">
																			<li><span class="font-icon"><i class="fa fa-facebook"></i></span><a target="_blank" href="https://www.facebook.com/">Facebook</a></li>
																						<li><span class="font-icon"><i class="fa fa-twitter"></i></span><a target="_blank" href="https://twitter.com/login">Twitter</a></li>
																						<li><span class="font-icon"><i class="fa fa-youtube"></i></span><a target="_blank" href="https://www.youtube.com/">YouTube</a></li>
																						<li><span class="font-icon"><i class="fa fa-instagram"></i></span><a target="_blank" href="#">Instagram</a></li>
																	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="container-fluid ">
	<div class="row last-footer text-center">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<ul class="footer-link">
										    <li><a href="<?php echo e(url('/Terms-&-Conditions')); ?>">Terms & Conditions</a></li>
											<li><a href="<?php echo e(url('/Privacy-Policy')); ?>">Privacy Policy</a></li>
											<li><a href="<?php echo e(url('/copy-right')); ?>">Copyright Policy</a></li>
											<li><a href="<?php echo e(url('/Intellectual-Property')); ?>">Intellectual Property</a></li>
								</ul>
			<p class="last-p"> © <?php echo e(date("Y").$settings->trademark); ?> </p>
		</div>
	</div>
</div>
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

<!-- Mirrored from 48-h.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:13 GMT -->
</html>
<?php /**PATH E:\xampp\htdocs\48h\resources\views/48-h/footer.blade.php ENDPATH**/ ?>