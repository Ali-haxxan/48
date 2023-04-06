<!doctype html>
<html>

<!-- Mirrored from 48-h.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($settings->title); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('logo/'.$settings->logo)); ?>" />
    
	

   <link rel="stylesheet" href="<?php echo e(asset('48h/assets/site/main/css/bootstrap.min.css')); ?>" />
   
    <link rel="stylesheet" href="<?php echo e(asset('48h/assets/site/main/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('48h/assets/site/main/css/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('48h/assets/site/main/css/auction.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('48h/assets/site/sweetalert/sweetalert.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('48h/assets/site/lightgallery/css/lightgallery.css')); ?>" />

    <script src="<?php echo e(asset('48h/assets/site/main/js/jquery-3.3.1.min.js')); ?>"></script>
	
    <script src="<?php echo e(asset('48h/assets/site/main/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('48h/assets/site/main/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('48h/assets/site/main/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('48h/assets/site/main/js/sha.js')); ?>"></script>
    <script src="<?php echo e(asset('48h/assets/site/main/js/owl.carousel.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <script src="<?php echo e(asset('48h/assets/site/sweetalert/sweetalert.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('48h/assets/site/lightgallery/js/lightgallery-all.min.js')); ?>" type="text/javascript"></script>

    <script>
        $(function() { $('.alert').delay(5000).fadeOut(10000); });
    </script>
	<style>
        .btn-features:hover {
            background: lightgrey;
        }
        .child-li{
            display: none;
        }
        .menu-bar li:hover .child-li{
            display: block;
            position: absolute;
            margin-left: 110px;
            margin-top: -34px;
        }
        .menu-bar li:hover .child-li ul{
            display: block;
        }

        </style>

</head>
		<body class="bodybg">

			<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
        
<style>

   .nav-link {

   font-size: 0.85em !important;
    margin-top: 4px !important;
   }

/* Dropdown Menu */
nav ul li ul {
 position:absolute;
    background: #eeefea;
    width: auto;
	padding: 10px;

    display: none; }
nav ul li ul li {
    text-align: left;
    width: 20%; }

nav ul li:hover ul { display: block;
z-index:1000000;}
	</style>

	<script>

	// var upgradeTime = <?php echo json_encode($TSeconds); ?>;
	// var seconds = upgradeTime;
	// function timer() {
	// 	var hours        = Math.floor(seconds/60/60);
	// 	var minutesLeft   = Math.floor((seconds) - (hours*3600));
	// 	//var minutes       = Math.floor(minutesLeft/3600);
	// 	//var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
	// 	var minutes     = Math.floor(minutesLeft/60);
	// 	var remainingSeconds = seconds % 60;
	// 	function pad(n) {
	// 		return (n < 10 ? "0" + n : n);
	// 	}
	// 	document.getElementById("hours").innerHTML = pad(hours);
	// 	 document.getElementById("mins").innerHTML = pad(minutes);
	// 	 document.getElementById("sec").innerHTML = pad(remainingSeconds);
	// 	//document.getElementById('countdown').innerHTML = pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds)+' Hrs'
	// 	if (seconds == 0) {
	// 		clearInterval(countdownTimer);
	// 		document.getElementById("hours").innerHTML = "00";
	// 		document.getElementById("mins").innerHTML = "00";
	// 		document.getElementById("sec").innerHTML = "00";
	// 		} else {
	// 		seconds--;
	// 	}
	// }
	// var countdownTimer = setInterval('timer()', 990);



</script>

<!-- content section -->
<div class="content-sec mb-3">
<div class="banner-sec">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 innerpage-banner">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-8">
						<div class="inner-banner-heading">Auction</div>
						<ul class="breadcum">
							<li><a href="../index.html">Home</a></li>
							<li><a href="#">Product Details</a></li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="container">
		<div class="row">
			<div class="col-12  innergraybg">
                
				<div class="left-content-sec ">
					<!-- heading section -->
					<div class="left-heading-sec d-flex justify-content-center">
						<div class="row col-12 d-flex justify-content-center">
							<div class="  col-md-12 col-lg-12 d-flex justify-content-center">
								<?php if($TSeconds < 86400): ?> 
								<p class="larg-heading " > Auction <?php echo e(\Carbon\Carbon::now('Europe/London')->addDays(-1)->format('Ymd')); ?> </p>
								<?php else: ?> 
								<p class="larg-heading " > Auction <?php echo e(\Carbon\Carbon::now('Europe/London')->format('Ymd')); ?> </p>
								<?php endif; ?>
							</div>
							<div class="  col-md-12 col-lg-12 d-flex justify-content-center">
								<p class="larg-heading d-flex justify-content-center" id="today_timer"></p>
							</div>
						</div>
						
					</div>
					
					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-12 col-lg-6">
							<?php
										$images = json_decode($Product->image);
									?>
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner" role="listbox">
												<div class="carousel-item active" >
															<a title="Click to preview product images" data-toggle="modal" data-target=".bd-example-modal-xl" >
																<img class="d-block " src="<?php echo e(asset($Product->feature_image)); ?>"  class="img-fluid mb-2" alt="<?php echo e(asset($Product->feature_image)); ?>" style="width: 100%;"/>
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
							<div class="col-12 col-sm-12 col-md-12 col-lg-6">
								<div class="left-heading-sec mb-3 ">
									<h2 class="larg-heading">Biding</h2>
								</div>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12">
										<p class="bidprice <?php echo e($Product->max_bid == null ? 'No Bid' : 'price'); ?>"><?php echo e($Product->max_bid == null ? 'No Bid' : $Product->max_bid); ?><span>Current Bid</span></p>
										<ul class="commonul">
											<li>Item ID <span><?php echo e($Product->product_unique_id); ?></span></li>

											<li>Catalogue Number <span><?php echo e($Product->cataloge_nrs); ?>  +<?php echo e($Product->catlogue_no); ?> </span></li>
											<li>Bids <span><?php echo e($bidCount); ?></span></li>
											<li>Country <span><?php echo e($Product->name); ?></span></li>
                                            <li>Year<span><?php echo e($Product->year); ?></span></li>
										</ul>
									</div>
									<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center">


											<?php if(Auth::guard('web')->user() == true): ?>
											<p class="mt-4"><a   class="btn btn-subs-custm  bidnow" type="button" >Bid Now</a></p>
											<?php else: ?>
											<p class="mt-4"><a  href="<?php echo e(route('user.login')); ?>" class="btn btn-subs-custm  " type="button" >Bid Now</a></p>
											<?php endif; ?>


										</div>
									</div>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4">
							<div class="aboutseller">
								<div class="row">
									<div class="deliveryarea pl-4">
										<div class="left-heading-sec mb-2 ">
											<h2 class="larg-heading">About Seller</h2>
										</div>
										<div class="row">



											<div class="col-12 pl-4">
												<label>Country :</label>	<span><?php echo e($Product->name); ?></span>
                                            </div>
											<div class="col-12 pl-4">
												<label>Product Category :</label> <span><?php echo e($Product->category); ?></span>
                                            </div>
											<?php if(!empty($item->Sub_Category)): ?>
											<div class="left-body-heading">Sub-Category :  <span><?php echo e($item->Sub_Category); ?></span> </div>
											<?php endif; ?>

											<input type="text" value="<?php echo e($Product->id); ?>" name="id" class="product_id form-control" hidden />
										</div>
									</div>

								</div>

							</div>
						</div>
							<div class="col-12 col-sm-12 col-md-8 col-lg-8">
									<div class="left-heading-sec mb-3 pl-2">
										<h2 class="larg-heading">Description</h2>
									</div>
									<?php $__currentLoopData = $Features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<p class="text-justify pl-2"><input type="checkbox" checked/> <?php echo e($feature->description); ?></p>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
					</div>


					<div class="row ">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 pl-4">
							<div class="left-heading-sec mb-3 ">
								<h3>Seller Rating:
									<i class="fa <?php echo e($Product->rating >= 1 ? 'fa-star' : ''); ?>"></i>
									<i class="fa <?php echo e($Product->rating >= 2 ? 'fa-star' : ''); ?>"></i>
									<i class="fa <?php echo e($Product->rating >= 3 ? 'fa-star' : ''); ?>"></i>
									<i class="fa <?php echo e($Product->rating >= 4 ? 'fa-star' : ''); ?>"></i>
									<i class="fa <?php echo e($Product->rating >= 5 ? 'fa-star' : ''); ?>"></i>
								</h3>
							</div>
						</div>
					</div>
					<div class="left-heading-sec d-flex justify-content-center mt-2 pl-4">
						<h2 class=" larg-heading">Seller Other Product's </h2>
					</div>
					<div class="left-content-sec">
						<div  id="style-1">
                            <div class="register-content-sec heightfull">
                                <div  id="style-1">

                                    <div class="card-body col-12">
                                        <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Image</th>
                                                <th>Country</th>
                                                <th>cat. + nr.</th>
                                                <th>item descr.</th>
                                                <th>itemnr.</th>
                                                <th>Year</th>
                                                <th>cat.price</th>
                                                <th>actual bid</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $SellerProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($Product->id != $item->id): ?>
                                                <tr>
                                                    <td><a href=""><i class="fa fa-regular fa-heart"></i></a></td>
                                                    
                                                    <td class="tdimg">
                                                        <a href="<?php echo e(route('Bid.product', $item->id )); ?>">
                                                            <img  src="<?php echo e(asset($item->feature_image)); ?>" alt="product_img"  style="width: 50%;">
                                                        </a>
                                                    </td>
                                                    <td><?php echo e($item->name); ?></td>
                                                    <td><?php echo e($item->cataloge_nrs); ?> + <?php echo e($item->catlogue_no); ?></td>
                                                    <td class="tdimg"><?php echo e($item->description); ?>...</td>
                                                    
                                                    
                                                    
                                                    <td><?php echo e($item->product_unique_id); ?></td>
                                                    <td><?php echo e($item->year); ?></td>
                                                    
                                                    <td><?php echo e($item->start_price); ?></td>
                                                    <td>
                                                        <?php if(!empty($todayBids)): ?>
                                                            <?php $__currentLoopData = $todayBids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidPt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($item->id == $bidPt->id ): ?>
                                                                    <?php if($bidPt->user_id == $usr): ?>
                                                                        <?php if($bidPt->amount == $item->max_bid || $bidPt->amount > $item->max_bid): ?>
                                                                            <span style="color: green; font-size: 28px;" ><b><?php echo e($bidPt->amount); ?></b></span>
                                                                            <?php break; ?>
                                                                        <?php else: ?>
                                                                            <span style="color: red; font-size: 18px;" ><b> <?php echo e($item->max_bid); ?></b></span>
                                                                            <?php break; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php if($loop->last): ?>
                                                                        <b style="font-size: 18px;" > <?php echo e($item->max_bid); ?></b>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <b style="font-size: 18px;" > <?php echo e($item->max_bid); ?></b>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(route('Bid.product', $item->id )); ?>" class="btn btn-danger" title="Click here to view product details">Bid</a>
                                                    </td>
                                                    



                                                </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
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
 <!-- Add  Modal -->
<div class="modal fade" id="BidModal" tabindex="0" role="dialog" aria-labelledby="BidModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  	<div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="BidModalCenterTitle">Please Enter Bid Amount</h5>

			</div>
			<div class="modal-body">
					<ul id="saveform_errlist"></ul>
					<ul id="success_message"></ul>

					<div class="form-group mb-3">
						<input type="number" class="bid form-control" placeholder="Bid Amount..."/>
					</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary close_bid" data-dismiss="modal">Close</button>
			  <button type="submit" class="savebtn btn btn-primary">Bid</button>
			</div>
		</div>
	</div>
</div>


<style>
	.bd-example-modal-xl{
		margin-top: -100px
	}
</style>
<div class="modal fade bd-example-modal-xl"  role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
		<?php
			$images = json_decode($Product->image);
		?>
		<div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<a  data-toggle="modal" data-target=".bd-example-modal-xl" >
							<img class="d-block " src="<?php echo e(asset($Product->feature_image)); ?>"  class="img-fluid mb-2" alt="<?php echo e(asset($Product->feature_image)); ?>preview" style="width: 100%;"/>
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
	var new_bid = $('.bid').val();
	alert('are you sure you want to bid $ '+new_bid+' !')

    var data = {
                'bid': new_bid,
				'product_id': $('.product_id').val(),
            }
			// console.log(data);
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

              $.ajax({
                type: 'POST',
                url: '/user/bid',
                data: data,
                dataType: 'json',
                success: function (response) {
					// console.log(response);

                  if(response.status == 400){
					$('#success_message').html("");
				  	$('#success_message').removeClass('alert alert-success');
                    $('#saveform_errlist').html("");
                    $('#saveform_errlist').addClass('alert alert-danger');
                      $.each(response.errors, function (key, err_value) {
                    $('#saveform_errlist').append('<li>' + err_value + '</li>');
                    });

                }
				else if(response.status == 201){
					$('#success_message').html("");
				  	$('#success_message').removeClass('alert alert-success');
					$('#saveform_errlist').html("");
                    $('#saveform_errlist').addClass('alert alert-danger');
                    $('#saveform_errlist').append('<li>' + response.errors + '</li>');

				}
                else{
				  $('#saveform_errlist').html("");
                  $('#saveform_errlist').removeClass('alert alert-danger');
                  $('#BidModal').find('input').val('');
                  $('#saveform_errlist').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                //   $('#BidModal').modal('hide');
                  $('#BidModal').find('input').val('');
                }
                }
              });
  });

  //  End Create Model Part ans store to database


  // Start Add Model Close Button

  $(document).on('click','.close_bid', function () {
                  $('#saveform_errlist').html("");
				  $('#saveform_errlist').removeClass('alert alert-danger');
				  $('#success_message').html("");
				  $('#success_message').removeClass('alert alert-success');
                  $('#BidModal').find('input').val('');
				  location.reload(true);
    });
});
</script>

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
<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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
		if(tdistance > 1){
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

<?php /**PATH C:\Users\Home PC\Downloads\48h\resources\views/48-h/body/bid.blade.php ENDPATH**/ ?>