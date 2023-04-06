<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-sec">
	<div class="container">
		<div class="row">
			
			<div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
				<div class="left-heading-sec d-flex justify-content-center">
					<h2 class="larg-heading">Item Review</h2>
				</div>
				<div class="register-content-sec heightfull">
					<div  id="style-1">
						
						<?php 
										$images = json_decode($item->image);
									?>
						<div class="left-body-sec">
							<div class="left-sec-row row">
								<div class="col-12 col-sm-12 col-md-12  col-lg-4 col-xl-4" style="padding-left: 0px;">
									<div class="img-sec" >
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner" role="listbox">
												<div class="carousel-item active" >
													<a title="Click to preview product images" data-toggle="modal" data-target=".bd-example-modal-xl" >
														<img class="d-block " src="<?php echo e(asset($item->feature_image)); ?>"  class="img-fluid " alt="<?php echo e(asset($item->feature_image)); ?>" style="width: 100%;"/>
													</a>
										        </div>
													<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										        		<div class="carousel-item " >
																<a title="Click to preview product images" data-toggle="modal" data-target=".bd-example-modal-xl" ><img class="d-block " src="<?php echo e(asset($image->image)); ?>"  class="img-fluid mb-2" alt="<?php echo e(asset($image->image)); ?>" style="width: 100%;"/></a>
										        		</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										    </div>
										    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										        <span class="sr-only">Previous</span>
										    </a>
										    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										        <span class="carousel-control-next-icon" aria-hidden="true"></span>
										        <span class="sr-only">Next</span>
										    </a> 
										</div>
									</div>
								</div>
								
								<div class="col-12 col-sm-12 col-md-12  col-lg-8 col-xl-8" style="padding-left: 0px;">
									<div class="img-rel-cont ">
										<div class="left-body-heading"><a href=""><?php echo e($item->product_name); ?></a></div>
											<div class="col-12">
												<div  class="row">
													<div class="left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding-left: 0px" >Country : <?php echo e($item->country); ?></div>
													<div class="left-body-heading col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5" style="padding: 0px"> 
														<div>Item number : <?php echo e($item->product_unique_id); ?></div> 
													</div>
												</div>
											</div>
											<div class="left-body-heading">Category :  <span><?php echo e($item->category); ?></span> </div>
											<?php if(!empty($item->catalogue)): ?>
												<div class="left-body-heading">Cateloge :  <span><?php echo e($item->catalogue); ?> </span> </div>
											<?php endif; ?>
											<div class="left-body-heading">Cateloge Nr :  <span><?php echo e($item->catlogue_no); ?></span> </div>
											<div class="col-12">
												<div  class="row">
													<div class="left-body-heading left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding-left: 0px" >Actual price : <b>US <?php echo e($item->start_price); ?></b></div>
													<div class="left-body-heading  left-body-heading  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5" style="padding-left: 0px">
														 
														
															<b style="font-size: 28px;" >Wining Bid : <?php echo e($item->bid_amount); ?></b>
														
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
													<p style=" font-size: 21px;"> <span><i class="fa fa-info-circle"></i></span><b> additional info :</b> <?php echo e($item->description); ?></p>
											</div>
											
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-3 col-md-3 pr-md-0 ">
				<!-- tata sky add -->
									<div class="advertise">
						<img src="<?php echo e(asset('48h/assets/site/main/advertise/1569845067_secondad.png')); ?>" alt="Solution of Outstanding results" />
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
					<span><?php echo e(Session::get('asuccess')); ?></span>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary bid_close_btn" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	   <!--End - watchlist Modal -->
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

	
<style>
	.bd-example-modal-xl{
		margin-top: -100px
	}
</style>
<div class="modal fade bd-example-modal-xl"  role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
		<?php 
			$images = json_decode($item->image);
		?>
		<div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<a  data-toggle="modal" data-target=".bd-example-modal-xl" >
							<img class="d-block " src="<?php echo e(asset($item->feature_image)); ?>"  class="img-fluid mb-2" alt="<?php echo e(asset($item->feature_image)); ?>preview" style="width: 100%;"/>
						</a>
			        </div>
					 
					<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        	<div class="carousel-item " >
								<a  data-toggle="modal" data-target=".bd-example-modal-xl" >
									<img class="d-block " src="<?php echo e(asset($image->image)); ?>"  class="img-fluid mb-2" alt="<?php echo e(asset($image->image)); ?>preview" style="width: 100%;"/>
									</a>
			        	</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </div>
			    <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
			        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			        <span class="sr-only">Previous</span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
			        <span class="carousel-control-next-icon" aria-hidden="true"></span>
			        <span class="sr-only">Next</span>
			    </a> 
			</div>
		</div>
    </div>
  </div>
</div>
		   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function () {
	//called when key is pressed in textbox
	$(document).on('click','.bidnow', function () {
		// .appendTo("body")
    	$('#BidModal').modal('show');

	});

	$(document).on('click','.savebtn',function (e) {
    e.preventDefault();
	

			
             
  });

  
});
</script>	


<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/User/body/review-products.blade.php ENDPATH**/ ?>