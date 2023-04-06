<?php echo $__env->make('48-h/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('48-h/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
   $print = $settings->how_it_works;
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
        <div class="blanksection"></div>
    </div>
    <?php echo $__env->make('48-h/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/48-h/body/HowItsWorks.blade.php ENDPATH**/ ?>