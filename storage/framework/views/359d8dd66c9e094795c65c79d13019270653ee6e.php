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
                    <div class="py-3 mt-2 left-heading-sec d-flex justify-content-center">
                        <a href="<?php echo e(route('Products.48',$id)); ?>"><span class="viewallCls">View All Products</span></a>
                    </div>






























































































				</div>


				<div class="col-lg-6 col-md-12">
					<div class="left-heading-sec d-flex justify-content-center">
						<h2 class="larg-heading d-flex justify-content-center">Yesterday <?php echo e($featuresName); ?> Auction </h2>
					</div>
                    <div class="py-3 mt-2 left-heading-sec d-flex justify-content-center">
                        <a href="<?php echo e(route('Products.24',$id)); ?>"><span class="viewallCls">View All Products</span></a>
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


<?php /**PATH E:\xampp\htdocs\48-h\resources\views/48-h/features.blade.php ENDPATH**/ ?>