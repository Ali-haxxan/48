<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-sec">
	<div class="container" >
		<div class="row">
			<div class="col-12">
				
                <div class="left-heading-sec d-flex justify-content-center">
					<div class="row col-12 d-flex justify-content-center">
						<div class="  col-md-12 col-lg-12 d-flex justify-content-center">
								<h2 class="larg-heading d-flex justify-content-center">Yesterday Auction Products </h2>
						</div>
						<div class="  col-md-12 col-lg-12 d-flex justify-content-center">
								<p class="larg-heading d-flex justify-content-center">Auction <?php echo e(\Carbon\Carbon::now('Europe/London')->addDays(-1)->format('Ymd')); ?></p>
						</div>
						<div class="col-sm-12 col-lg-12 d-flex justify-content-center">
								<p class="larg-heading d-flex justify-content-center" id="yesterday_timer"></p>
						</div>
					</div>
				</div>
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
                                    <?php $__currentLoopData = $yestardayAuctionProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <?php if(!empty($yesterdayBids)): ?>
                                                    <?php $__currentLoopData = $yesterdayBids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidPt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                </div>
                            </div>









































































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


<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
	var distance = <?php echo json_encode($YSeconds); ?>;

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

<?php /**PATH C:\Users\Home PC\Downloads\48h\resources\views/48-h/body/products48h.blade.php ENDPATH**/ ?>