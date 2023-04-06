<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="clearfix"></div>
<div class="content-sec">
	<div class="container">
			<div class="bannerarea">
				<div class="container-fluid-slider">
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




		<div class="headingtext">Gateway HongKong for your collectables, sell/buy within <br>48 hours</div>
        <br><br>
        <div class="container desktop-hide-text" >
            <div class="row justify-content-center">
                <div class="col-6">
                    <h2 class="text-white text-center top-text " style="text-shadow: 2px 2px black; ">
                        Use our unique <br><b>48-h</b> elixer <br>made from <br>mandatory ratings.
                    </h2>
                </div>
                <div class="col-6">
                    <h2 class="httext text-white text-center top-text" style="text-shadow: 2px 2px black;">
                        Find  here what  you’ve <br>  always been looking for.
                    </h2>
                </div>
            </div>
        </div>

        <div class="container hide-text">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h4 class=" text-center headingtext " style="color: black !important; -webkit-text-stroke: 1px black;"  >
                        Use our unique <br><b>48-h</b> elixer <br>made from <br>mandatory ratings.
                    </h4>
                </div>
                <div class="col-6">
                    <h4 class="httext text-center headingtext " style="color: black !important; -webkit-text-stroke: 1px black;">
                        Find  here what  you’ve <br>  always been looking for.
                    </h2>
                </div>
            </div>
        </div>


















































		<div class="blanksection"></div>

        <br><br><br>

		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12" style="
				display: flex;
				align-items: center;
				">


            <div class="row justify-content-center">
                <div style="margin-bottom: 20px">
                    <h4 class="text-center font-weight-bold " style="font-size: 22px; font-family: 'fertigo_proregular';">
                        Urgent need?<br>  Garanteed sold within <br> 48 hours at 0% costs.<br>  No fee, no VAT and no taxes.</h4>
                </div>
                <br><br> <br><br>














                <div class="col-12 mt-3 justify-content-center">
                    <img class="mx-auto d-block picturecenter"  src="<?php echo e(asset('48h/home/picturecenter.png')); ?>" >
                    <br><br>
                </div>

                <div class="">
                    <h4 class="text-center font-weight-bold " style="font-size: 22px; font-family: 'fertigo_proregular';">for quick and most discrete<br>
                        settlement within 48 hours <br>
                        via gateway Hong Kong</h4>

                </div>

                <div class="col-12 mt-5">
                    <h3></h3>
                    <h1 class="text-center font-weight-bold" style="color:#AD393A; font-family: 'fertigo_proregular'; ">Auction Categories</h1>
                    <h4 class="text-center font-weight-bold" style="font-size: 22px; font-family: 'fertigo_proregular';">Always 2 ongoing auctions, one started at midnight <br>
                        yesterday the next at last midnight, with 3 auction <br>
                        categories. Auction number is the date and duration <br>

                        is 48 hours</h4>
                    <div class="row justify-content-center" style=" font-family: 'fertigo_proregular';">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-12 col-sm-12 p-2 d-flex justify-content-center ">
                                <div class="d-flex flex-column">
                                    <a class="pt-2 d-flex justify-content-center" href="<?php echo e(route('home.category.feature',$item->id)); ?>">
                                        
                                    </a>
                                    <a class="pt-3 d-flex justify-content-center dropdown  <?php echo e($item->category); ?>12" href="<?php echo e(route('home.category.feature',$item->id)); ?>">
                                        <a class="btn btn-subs-custm  dropdown" href="<?php echo e(route('home.category.feature',$item->id)); ?>"  style="

                                        -width: 175px; " id="<?php echo e($item->category); ?>" > <?php echo e($item->category); ?></a>

                                        
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
                                                    <a class="btn btn-subs-custm " href="<?php echo e(route('sub.category',$items->id)); ?>"  style="min-width: 175px; " > <?php echo e($items->Sub_Category); ?></a>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div></div>
            <div class="col-lg-4 col-sm-12 col-md-6 pr-md-0 ">
                <div class="right-body-sec">
                    <div class="green-logo">
                        <img src="<?php echo e(asset('logo/'.$settings->logo)); ?>" alt="logo" width="100%" />
                    </div>
                    <p>Unique auction with the best deals for seller and buyer, distinguished by the Max Havelaar Foundation for Fair Trade, with most features and various awards. </p>
                    <ul class="arow-list">
                        <li>Purchase and sale at 0% costs</li>
                        <li>Lowest shipping cost guarantee</li>
                        <li>Fastest purchase and sale result</li>
                        <!--	<li>Time-delayed bidding</li>-->
                        <li>Free alert service</li>
                    </ul>
                </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 p-0 my-3">
                        <div class="collection-bg2">
                            <div class="outer-boder outer-boder2">
                                <h5>Buy / Sell In HongKong</h5>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="col-12 pt-5" ></div>


				


			





		</div>
		

























        <div class="bannerboxes">
            <div class="container pl-md-0 pr-md-0">
                <div id="servicecarousel" >
                    <div class="row">
                        <div class="item col-sm-12 col-md-3">
                            <div class="httext" style="display: none">
                                <span><i class="fa fa-users" aria-hidden="true"></i></span>
                                <a style="color:rgb(192,0,0)" title="Today Visitors">Today Visitors<br>
                                    <span style="text-align:center;display: block; color:black"  ><?php echo e($todayVisitors); ?></span>
                                </a>
                            </div>
                        </div>

                        <div class="item col-sm-12 col-md-2">
                            <div class="httext">
                                <span><i class="fa fa-users" aria-hidden="true"></i></span>
                                <a style="color:rgb(192,0,0)" title="Today Visitors">Today Visitors<br>
                                    <span style="text-align:center;display: block; color:black"  ><?php echo e($todayVisitors); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="item col-sm-12 col-md-2" >
                            <div class="httext">
                                <span><i class="fa fa-users" aria-hidden="true"></i></span>
                                <a style="color:rgb(192,0,0)" title="Total Visitors">Total Visitors<br>
                                    <span style="text-align:center;display: block;color:black"><?php echo e($allVisitors); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="item col-sm-12 col-md-3" >
                            <div class="httext thirdres">
                                <span><i class="fa fa-users" aria-hidden="true"></i></span>
                                <a style="color:rgb(192,0,0)" title="Total Registered Users">Total Reg. Users <br>
                                    <span style="text-align:center;display: block;color:black" ><?php echo e($users); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\Home PC\Downloads\48h\resources\views/48-h/body/home.blade.php ENDPATH**/ ?>