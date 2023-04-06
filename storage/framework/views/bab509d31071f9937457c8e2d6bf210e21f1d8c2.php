<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="clearfix"></div>
<div class="content-sec">
	<div class="container">
			<div class="bannerarea">
				<div class="container pl-md-0 pr-md-0">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class=""></li>
							<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="2" class=""></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
									<img src="<?php echo e(asset('48h/assets/site/main/home_banner/1569578869_slider1.jpg')); ?>" alt="banner"> 
								<div class="carousel-caption">
									<!--<p>Place</p>
										<h3>Highest & Unique Bid</h3>
									<p>to Get it At your home.</p>-->
									<!--<div class="homeslider-btn-wrap"><a class="homeslider-btn" href="#">Bid Now</a></div>-->
								</div>
							</div>
							<div class="carousel-item ">
									<img src="<?php echo e(asset('48h/assets/site/main/home_banner/1569578832_slider2.jpg')); ?>" alt="banner"> 
								<div class="carousel-caption">
									<!--<p>Place</p>
										<h3>Highest & Unique Bid</h3>
									<p>to Get it At your home.</p>-->
									<!--<div class="homeslider-btn-wrap"><a class="homeslider-btn" href="#">Bid Now</a></div>-->
								</div>
							</div>
							<div class="carousel-item ">
									<img src="<?php echo e(asset('48h/assets/site/main/home_banner/1569578817_slider1.jpg')); ?>" alt="banner"> 
								<div class="carousel-caption">
									<!--<p>Place</p>
										<h3>Highest & Unique Bid</h3>
									<p>to Get it At your home.</p>-->
									<!--<div class="homeslider-btn-wrap"><a class="homeslider-btn" href="#">Bid Now</a></div>-->
								</div>
							</div>
						</div>
						<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						</a>
						<a class="carousel-control-next" href="#myCarousel" data-slide="next">
							<span class="carousel-control-next-icon"></span>
						</a>
					</div>
				</div>
			</div>
					
				
		
		
		<div class="headingtext">Gateway HongKong for your collectables, sell/buy within 48 hours</div>
		<div class="bannerboxes"> 
			<div class="container pl-md-0 pr-md-0">
				<div id="servicecarousel" >
					<div class="row">
						<div class="item col-sm-12 col-md-4">
							<div class="httext">
								<span><i class="fa fa-users" aria-hidden="true"></i></span>
								<a  title="Today Visitors">Today Visitors<br>
									<span style="text-align:center;display: block;"  ><?php echo e($todayVisitors); ?></span>
								</a>
							</div>
						</div>
						<div class="item col-sm-12 col-md-4" >
							<div class="httext">
								<span><i class="fa fa-users" aria-hidden="true"></i></span>
								<a title="Total Visitors">Total Visitors<br>
									<span style="text-align:center;display: block;"><?php echo e($allVisitors); ?></span>
								</a>
							</div>
						</div>
						<div class="item col-sm-12 col-md-3" > 
							<div class="httext">
								<span><i class="fa fa-users" aria-hidden="true"></i></span>
								<a title="Total Registered Users">Total Registered Users <br>
									<span style="text-align:center;display: block;" ><?php echo e($users); ?></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="blanksection"></div>
		<div class="row mt-5">
			<div class="col-lg-9 col-md-6 col-sm-12" style="
				display: flex;
				align-items: center;
				">
				<div class="row justify-content-around">
					<div class="col-lg-4 col-sm-12 d-flex flex-column justify-content-center">
						<h4>
							Use our unique <b>48-h</b> elixer made from mandatory ratings.
						</h4>
						<div class="d-flex justify-content-center">
							<img class="m-2" src="<?php echo e(asset('48h/home/Picture2.png')); ?>" width="250px" height="150px" alt="fish">
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-flex flex-column justify-content-center">
						<h4 class="httext">
							Find  here what  you’ve   always been looking for.
						</h4>
						<div class="d-flex justify-content-center">
							<img class="m-2" src="<?php echo e(asset('48h/home/Picture1.png')); ?>" width="200px" height="150px" alt="victory">
						</div>
					</div>
				</div>
			</div>
			
				
			
				


			
			

			<div class="col-lg-3 col-sm-12 col-md-6 pr-md-0 ">
				<div class="right-body-sec">
					<div class="green-logo">
						<img src="<?php echo e(asset('logo/'.$settings->logo)); ?>" alt="logo" width="100%" />
					</div>
					<p>Unique auction with the best deals for seller and buyer, distinguished by the Max Havelaar Foundation for Fair Trade, with most features and various awards. </p>
					<ul class="arow-list">
						<li>Purchase and sale at 0% costs</li>
						<li>Lowest shipping cost guarantee</li>
						<li>Fastest purchase and sale result</li>
					<!--	<li>Time-delayed bidding</li>-->
						<li>Free alert service</li>
						<li>Wallet  service</li>
					</ul>
				</div>
			</div>

			
		</div>
		
		<div class="row">
			<div class="col-lg-9 col-md-6" style="
				display: flex;
				align-items: center;
			">
				<div class="col-12  ">
					<div class="row justify-content-center">
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
							<div class="col-lg-4 col-md-12 col-sm-12 p-2 d-flex justify-content-center ">
								<div class="d-flex flex-column">
									<a class="pt-2 d-flex justify-content-center" href="<?php echo e(route('home.category.feature',$item->id)); ?>">
										<img src="<?php echo e(asset($item->img)); ?>" alt="category" width="155px" height="155px" style="border-radius: 50%">
									</a>
									<a class="pt-3 d-flex justify-content-center dropdown  <?php echo e($item->category); ?>12" href="<?php echo e(route('home.category.feature',$item->id)); ?>">
										<a class="btn btn-subs-custm  dropdown" href="<?php echo e(route('home.category.feature',$item->id)); ?>"  style="min-width: 175px; " id="<?php echo e($item->category); ?>" > <?php echo e($item->category); ?></a>
										
										
										<?php if(!empty($Subcategories)): ?>
											<?php $__currentLoopData = $Subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($items->category_id == $item->id): ?>
													<div class="d-flex justify-content-center">
														<i class="fa fa-angle-down"></i>
													</div>
													<?php break; ?>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										<?php if(!empty($Subcategories)): ?>
											<?php $__currentLoopData = $Subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($items->category_id == $item->id): ?>
													<a class="btn btn-subs-custm  mt-3" href="<?php echo e(route('sub.category',$items->id)); ?>"  style="min-width: 175px; " > <?php echo e($items->Sub_Category); ?></a>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</a>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-12 col-md-6 pr-md-0 ">
				<div class="col-sm-12 col-md-12 col-lg-12 p-0 my-3">
					<div class="collection-bg2">
						<div class="outer-boder outer-boder2">
							<h5>Sell In Hongkong</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 pt-5" ></div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
				<h3 class="text-center ">urgent need ? guaranteed sold within 48 hours at 0% costs no fee, no VAT, no taxes</h3>
			</div>
			<div class="row col-12 mt-3 justify-content-center">
				<div class="col-lg-3 col-md-4 col-sm-6 p-3 d-flex justify-content-center">
					<img src="<?php echo e(asset('48h/home/Picture3.png')); ?>" alt="picture3" width="185px" height="185px" >
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 p-3 d-flex justify-content-center">
					<img src="<?php echo e(asset('48h/home/Picture4.png')); ?>" alt="picture4" width="185px" height="185px" >
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 p-3 d-flex justify-content-center">
					<img src="<?php echo e(asset('48h/home/Picture5.png')); ?>" alt="picture5" width="185px" height="185px" >
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 p-3 d-flex justify-content-center">
					<img src="<?php echo e(asset('48h/home/Picture6.png')); ?>" alt="picture6" width="185px" height="185px" >
				</div>
			</div>
		</div>
		
	</div>
</div>

<!--startwishlist Modal -->
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
			  <button type="button" class="btn btn-secondary close_bid" data-dismiss="modal">Close</button>
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
	
	$(document).on('click','.close_bid', function () {
		// .appendTo("body")
    	$('#myDialogbox').hide();


	});
</script>
<script>
	$(document).ready(function(){
    // $('.carousel-item').first().addClass('active');
    $('.carousel-inner > div').first().addClass('active');
    $('.carousel').carousel();
});
</script>
<!-- content section -->
<!-- footer section -->
<!--- Subscribe Section-->

<script>
	$(function() {
		$('#subscribe_email_id').on('keypress', function(e) {
			if (e.which == 32)
			return false;
		});
	});
	function ajxCall(auctionID)
	{
		var baseURL = 'index.html';
		$.ajax({
			type: "post",
			url: baseURL +'home/updateFortyEightAuction',	    
			data: {'auctionID':auctionID},
			dataType:'json',
			success:function(data){
				if(data.status == true)
				{
					window.location.href = "index.html";
				}
				else
				{
					alert("Status did not change.");
				}
			} 
		});
	}	
</script>
 

<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/48-h/body/home.blade.php ENDPATH**/ ?>