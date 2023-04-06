<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
        $print = $settings->about_us;
?>
<div class="content-sec">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-9 col-md-9 pt-0 pl-md-0 ">
                <div class="register-content-sec heightfull">
                    <?php
                        echo $print;
                    ?>
                </div>
            </div>
        </div>
    </div>
	<div class="mb-4"></div>
	<?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/48-h/body/aboutUs.blade.php ENDPATH**/ ?>