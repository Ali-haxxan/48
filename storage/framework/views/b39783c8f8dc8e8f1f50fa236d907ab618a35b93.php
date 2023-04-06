<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-sec">
	<div class="container" >
		<div class="row">
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="left-heading-sec d-flex justify-content-center">
					<h2 class="larg-heading">Today Auction Products </h2>
				</div>
				<div class="register-content-sec heightfull">
					<div  id="style-1">
						<?php $__currentLoopData = $TodayAuctionProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="left-body-sec">
							<div class="left-sec-row row">
								<div class="col-12 col-sm-12 col-md-12  col-lg-4 col-xl-4" style="padding-left: 0px;">
									<div class="img-sec" >
										<a href="<?php echo e(route('Bid.product', $item->id )); ?>">
											<img  src="<?php echo e(asset($item->feature_image)); ?>" alt="product_img"  style="width: 100%;"/></a>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12  col-lg-8 col-xl-8" style="padding-left: 0px;">
									<div class="img-rel-cont ">
										<div class="left-body-heading"><a href="<?php echo e(route('Bid.product', $item->id )); ?>" title="Click here to view product details"><?php echo e($item->product_name); ?></a></div>
											
											<div class="left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px" >Country : <?php echo e($item->name); ?></div>
											<div class="left-body-heading col-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px">Item number : <?php echo e($item->product_unique_id); ?></div>
											<div class="left-body-heading">Category :  <span><?php echo e($item->category); ?></span> </div>
											<?php if(!empty($item->Sub_Category)): ?>
											<div class="left-body-heading">Sub-Category :  <span><?php echo e($item->Sub_Category); ?></span> </div>
											<?php endif; ?>
											<?php if(!empty($item->catalogue)): ?>
												<div class="left-body-heading">Cateloge Nr :  <span><?php echo e($item->cataloge_nrs); ?> </span> </div>
											<?php endif; ?>
											<div class="left-body-heading">Cateloge Number :  <span><?php echo e($item->catlogue_no); ?></span> </div>
											<div class="col-12">
												<div  class="row">
													<div class="left-body-heading left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding-left: 0px" >Actual price : <b>US <?php echo e($item->start_price); ?></b></div>
													<div class="left-body-heading  left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5" style="padding-left: 0px">
														
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
					</div>
				</div>
			</div>
			<div class="blanksection"></div>
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
					<span><?php echo e(Session::get('asuccess')); ?></span>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary bid_close_btn" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	   <!--End -wishlistModal -->
<script>
	var msg = '<?php echo e(Session::get('asuccess')); ?>';
	var exist = '<?php echo e(Session::has('asuccess')); ?>';
	if(exist){
		$('#myDialogbox').show();
	}
	
	$(document).on('click','.bid_close_btn', function () {
		// .appendTo("body")
    	$('#myDialogbox').hide();


	});
</script>

<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/48-h/body/products24.blade.php ENDPATH**/ ?>