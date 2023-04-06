<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="inner-banner-heading">Product's</div>
				<ul class="breadcum">
					<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
					<li><a href="#"><?php echo e($featuresName); ?> </a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="content-sec">
	<div class="px-lg-5">
		<div class="col-12 col-sm-12 col-md-12 pt-0 pl-md-0">
			<div class="row">
				
				<div class="col-lg-6 col-md-12">
					<div class="left-heading-sec d-flex justify-content-center">
						<h2 class="larg-heading d-flex justify-content-center">Today <?php echo e($featuresName); ?> Auction </h2>
					</div>
					<div class="register-content-sec heightfull">
						<?php if(empty($TodayAuctionProducts)): ?>
						<div class="py-3 mt-2 left-heading-sec d-flex justify-content-center">
							<h4> No Product available!</h4>
						</div>
						<?php else: ?>
						<div class="left-heading-sec d-flex justify-content-center">
							<div class="row col-12 d-flex justify-content-center">
								<div class="  col-md-12 col-lg-12 d-flex justify-content-center">
									<p class="larg-heading d-flex justify-content-center">Auction <?php echo e(\Carbon\Carbon::now('Europe/London')->format('Ymd')); ?></p>
								</div>
								<div class="col-sm-12 col-lg-12 d-flex justify-content-center">
									<p class="larg-heading d-flex justify-content-center" id="today_timer"></p>
								</div>
							</div>
						</div>
						<div  id="style-1">
							<?php $__currentLoopData = $TodayAuctionProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="left-body-sec">
								<div class="left-sec-row row">
									<div class="col-12 col-sm-12 col-md-12  col-lg-4 col-xl-4" style="padding-left: 0px;">
										<div class="img-sec" >
											<a href="<?php echo e(route('Bid.product', $item->id )); ?>">
												<img  src="<?php echo e(asset($item->feature_image)); ?>" alt="product_img"  style="width: 100%;"/>
											</a>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12  col-lg-8 col-xl-8" style="padding-left: 0px;">
										<div class="img-rel-cont ">
											<div class="left-body-heading"><a href="<?php echo e(route('Bid.product', $item->id )); ?>" title="Click here to view product details"><?php echo e($item->product_name); ?></a></div>
												<div class="left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px" >Country : <?php echo e($item->name); ?></div>
												<div class="left-body-heading col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px">Item number : <?php echo e($item->product_unique_id); ?></div>

												<?php
													$encoded = json_decode($item->image);
												?>
												<div class="left-body-heading">Category :  <span><?php echo e($item->category); ?></span></div>
												<?php if(!empty($item->Sub_Category)): ?>
												<div class="left-body-heading">Sub-Category :  <span><?php echo e($item->Sub_Category); ?></span> </div>
												<?php endif; ?>
												<?php if(!empty($item->catalogue)): ?>
													<div class="left-body-heading">Cateloge Nr:  <span><?php echo e($item->cataloge_nrs); ?> </span> </div>
												<?php endif; ?>
												<div class="left-body-heading">Cateloge number :  <span><?php echo e($item->catlogue_no); ?></span></div>
												<div class="col-12">
													<div  class="row">
														<div class="left-body-heading col-lg-7 col-sm-12" style="padding-left: 0px" >Actual price : <b>US <?php echo e($item->start_price); ?></b></div>
														<div class="left-body-heading col-lg-5 col-sm-12 " style="padding-left: 0px">
															<?php if(!empty($todayBids)): ?>
																<?php $__currentLoopData = $todayBids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidPt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<?php if($item->id == $bidPt->id ): ?>
																			<?php if($bidPt->user_id == $usr): ?>
																				<?php if($bidPt->amount == $item->max_bid || $bidPt->amount > $item->max_bid): ?>
																					<span style="color: green; font-size: 28px;" ><b>My Bid : <?php echo e($bidPt->amount); ?></b></span>
																					<?php break; ?>
																				<?php else: ?>
																					<span style="color: red; font-size: 28px;" ><b>Bid : <?php echo e($item->max_bid); ?></b></span>
																					<?php break; ?>
																				<?php endif; ?>
																			<?php endif; ?>
																		<?php else: ?>
																			<?php if($loop->last): ?>
																			<b style="font-size: 28px;" >Bid : <?php echo e($item->max_bid); ?></b>
																			<?php endif; ?>
																		<?php endif; ?>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php else: ?>
																<b style="font-size: 28px;" >Bid : <?php echo e($item->max_bid); ?></b>
															<?php endif; ?>
														</div>
													</div>
												</div>
												<div class="left-body-heading">Condition :  <span><?php echo e($item->features); ?></span> </div>
												<div class="left-body-heading">Seller :  <span><?php echo e($item->username); ?></span> </div>
												<div class="left-body-heading">
													Seller Rating: 
													<i class="fa <?php echo e($item->rating >= 1 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 2 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 3 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 4 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 5 ? 'fa-star' : ''); ?>"></i>
												</div>
												<div class="row-footer-sec" style="margin-top:0px;">
													<p style=" font-size: 21px;"><b>|</b> <a href="<?php echo e(route('Bid.product', $item->id )); ?>" title="Click here to view product details"><span><i class="fa fa-image"></i></span> more images </a><b>|</b> <a href="<?php echo e(route('seller.products', $item->seller_id)); ?>" title="Click here to view seller products"><span><i class="fa fa-ellipsis-h"></i></span> seller other items </a><b>|</b><a href="<?php echo e(url('/chatify',$item->seller_id)); ?>"> <span><i class="fa fa-comments"></i></span> contact seller </a><b>|</b><a href="<?php echo e(route('user.addWatchList', $item->id )); ?>" title="Click here to add product in wachlist"><span><i class="fa fa-heart"></i></span>&nbsp; wishlist</a><b>|</b> <span><i class="fa fa-info-circle"></i></span><b> additional info :</b> <?php echo e($item->description); ?></p>
												</div>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="py-3 mt-2 left-heading-sec d-flex justify-content-center">
								<a href="<?php echo e(route('Products.48',$id)); ?>"><span class="viewallCls">View All Products</span></a>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>


				<div class="col-lg-6 col-md-12">
					<div class="left-heading-sec d-flex justify-content-center">
						<h2 class="larg-heading d-flex justify-content-center">Yesterday <?php echo e($featuresName); ?> Auction </h2>
					</div>
					<div class="register-content-sec heightfull">
						<?php if( empty($yestardayAuctionProducts )): ?>
						<div class="py-3 mt-2 left-heading-sec d-flex justify-content-center">
							<h4> No Product available!</h4>
						</div>
						<?php else: ?>
						<div class="left-heading-sec d-flex justify-content-center">
							<div class="row col-12 d-flex justify-content-center">
								<div class="mt-2  col-md-12 col-lg-12 d-flex justify-content-center">
									<p class="larg-heading d-flex justify-content-center">Auction <?php echo e(\Carbon\Carbon::now('Europe/London')->addDays(-1)->format('Ymd')); ?></p>
								</div>
								<div class="mt-2  col-sm-12 col-lg-12 d-flex justify-content-center">
									<p class="larg-heading d-flex justify-content-center" id="yesterday_timer"></p>
								</div>
							</div>
						</div>
						<div  id="style-1">
							<?php $__currentLoopData = $yestardayAuctionProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="left-body-sec">
								<div class="left-sec-row row">
									<div class="col-12 col-sm-12 col-md-12  col-lg-4 col-xl-4" style="padding-left: 0px;">
										<div class="img-sec" >
											<a href="<?php echo e(route('Bid.product', $item->id )); ?>">
												<img  src="<?php echo e(asset($item->feature_image)); ?>" alt="product_img"  style="width: 100%;"/>
											</a>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md-12  col-lg-8 col-xl-8" style="padding-left: 0px;">
										<div class="img-rel-cont ">
											<div class="left-body-heading"><a href="<?php echo e(route('Bid.product', $item->id )); ?>" title="Click here to view product details"><?php echo e($item->product_name); ?></a></div>
												<div class="left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px" >Country : <?php echo e($item->name); ?></div>
												<div class="left-body-heading col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px">Item number : <?php echo e($item->product_unique_id); ?></div>
												<?php
													$encoded = json_decode($item->image);
												?>
												<div class="left-body-heading">Category :  <span><?php echo e($item->category); ?></span></div>
												<?php if(!empty($item->Sub_Category)): ?>
												<div class="left-body-heading">Sub-Category :  <span><?php echo e($item->Sub_Category); ?></span> </div>
												<?php endif; ?>
												<?php if(!empty($item->catalogue)): ?>
													<div class="left-body-heading">Cateloge Nr :  <span><?php echo e($item->cataloge_nrs); ?> </span> </div>
												<?php endif; ?>
												<div class="left-body-heading">Cateloge number :  <span><?php echo e($item->catlogue_no); ?></span></div>
												<div class="col-12">
													<div  class="row">
														<div class="left-body-heading col-lg-7 col-sm-12" style="padding-left: 0px" >Actual price : <b>US <?php echo e($item->start_price); ?></b></div>
														<div class="left-body-heading col-lg-5 col-sm-12 " style="padding-left: 0px">
															<?php if(!empty($todayBids)): ?>
																<?php $__currentLoopData = $yesterdayBids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidPt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<?php if($item->id == $bidPt->id ): ?>
																			<?php if($bidPt->user_id == $usr): ?>
																				<?php if($bidPt->amount == $item->max_bid || $bidPt->amount > $item->max_bid): ?>
																					<span style="color: green; font-size: 28px;" ><b>My Bid : <?php echo e($bidPt->amount); ?></b></span>
																					<?php break; ?>
																				<?php else: ?>
																					<span style="color: red; font-size: 28px;" ><b>Bid : <?php echo e($item->max_bid); ?></b></span>
																					<?php break; ?>
																				<?php endif; ?>
																			<?php endif; ?>
																		<?php else: ?>
																			<?php if($loop->last): ?>
																			<b style="font-size: 28px;" >Bid : <?php echo e($item->max_bid); ?></b>
																			<?php endif; ?>
																		<?php endif; ?>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php else: ?>
																<b style="font-size: 28px;" >Bid : <?php echo e($item->max_bid); ?></b>
															<?php endif; ?>
														</div>
													</div>
												</div>
												<div class="left-body-heading">Condition :  <span><?php echo e($item->features); ?></span> </div>
												<div class="left-body-heading">Seller :  <span><?php echo e($item->username); ?></span> </div>
												<div class="left-body-heading">
													Seller Rating: 
													<i class="fa <?php echo e($item->rating >= 1 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 2 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 3 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 4 ? 'fa-star' : ''); ?>"></i>
													<i class="fa <?php echo e($item->rating >= 5 ? 'fa-star' : ''); ?>"></i>
												</div>
												<div class="row-footer-sec" style="margin-top:0px;">
													<p style=" font-size: 21px;"><b>|</b> <a href="<?php echo e(route('Bid.product', $item->id )); ?>" title="Click here to view product details"><span><i class="fa fa-image"></i></span> more images </a><b>|</b> <a href="<?php echo e(route('seller.products', $item->seller_id)); ?>" title="Click here to view seller products"><span><i class="fa fa-ellipsis-h"></i></span> seller other items </a><b>|</b><a href="<?php echo e(url('/chatify',$item->seller_id)); ?>"> <span><i class="fa fa-comments"></i></span> contact seller </a><b>|</b><a href="<?php echo e(route('user.addWatchList', $item->id )); ?>" title="Click here to add product in wachlist"><span><i class="fa fa-heart"></i></span>&nbsp; wishlist</a><b>|</b> <span><i class="fa fa-info-circle"></i></span><b> additional info :</b> <?php echo e($item->description); ?></p>
												</div>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="py-3 mt-2 left-heading-sec d-flex justify-content-center">
								<a href="<?php echo e(route('Products.24',$id)); ?>"><span class="viewallCls">View All Products</span></a>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="blanksection"></div>
	<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>	
<script type="text/javascript" src="assets/site/main/js/sha.js"></script>

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
		if(distance > 1){
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

<script>
	
	var distance = <?php echo json_encode($Seconds); ?>;

	function ytimer() {
		var days        = Math.floor(distance/24/60/60);
		var hoursLeft   = Math.floor((distance) - (days*86400));
		var hours_m       = Math.floor(distance/3600);
		var minutesLeft_m = Math.floor((distance) - (hours_m*3600));
		var minutes_m     = Math.floor(minutesLeft_m/60);
		var remainingSeconds_m = distance % 60;

		function pad(n) {
			return (n < 10 ? "0" + n : n);
		}
		if(distance > 1){
			document.getElementById("yesterday_timer").innerHTML ="Time left: "+ pad(hours_m) + "h : "+ pad(minutes_m) + "m : " + pad(remainingSeconds_m) + "s ";
		if (distance == 0) {
			clearInterval(ycountdownTimer_m);
			document.getElementById("yesterday_timer").innerHTML ="Time left: "+  pad(hours_m) + "h : " + pad(minutes_m) + "m : " + pad(remainingSeconds_m) + "s ";
			} else {
			distance--;
		}
		}
		
	} 

	var ycountdownTimer_m = setInterval('ytimer()', 990);
	
</script>


<?php /**PATH E:\xampp\htdocs\48_h\resources\views/48-h/features.blade.php ENDPATH**/ ?>