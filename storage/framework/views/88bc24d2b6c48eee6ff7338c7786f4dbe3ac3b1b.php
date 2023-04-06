<header>
    <div class="topheader">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 pl-md-0 pr-md-0 topheader-inner">
                    <nav class="navbar navbar-expand-md navbar-default pl-md-0 pr-md-0 d-flex justify-content-end">
                        
                        <div  >
                            
                                <?php if( Auth::guard('seller')->user() == false && Auth::guard('web')->user()== false ): ?>
                                <a style="text-decoration: none; color:black;font-size: 19px;"  href="<?php echo e(route('user.login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a>
                                <?php endif; ?>
                                <?php if( Auth::guard('seller')->user() == true && Auth::guard('web')->user()== true): ?>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="<?php echo e(route('user.home')); ?>"><i class="fa fa-home"></i> My 4<sup><b>8</sup>-</b>h (buyer)</a> <b>|</b>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="<?php echo e(route('seller.home')); ?>"><i class="fa fa-home"></i> My 4<sup><b>8</sup>-</b>h (seller)</a> <b>|</b>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="<?php echo e(route('user.watchList')); ?>"><i class="fa fa-heart"></i> wishlist</a><b>|</b>
                                <a  style="text-decoration: none; color:black;font-size: 19px;" href="<?php echo e(route('seller.logout')); ?>" >Logout</a>
                                <?php endif; ?>
                                <?php if( Auth::guard('seller')->user() == false && Auth::guard('web')->user()== true): ?>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="<?php echo e(route('user.home')); ?>"><i class="fa fa-home"></i> My 4<sup><b>8</sup>-</b>h</a> <b>|</b>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="<?php echo e(route('user.watchList')); ?>"><i class="fa fa-heart"></i> wishlist</a><b>|</b>
                                <a class="btn-features"  style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="<?php echo e(route('user.logout')); ?>" ><i class="fa fa-sign-out"></i>Logout</a>
                                <?php endif; ?>                                     
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="midheader">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 pl-md-0  logotext">
                    <a title="Home" href="<?php echo e(url('/')); ?>">
                        <img  src="<?php echo e(asset('logo/'.$settings->logo)); ?>" alt="logo" />
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 pl-md-0 pr-md-0 nav-sec">
                    <nav class="navbar navbar-expand-md navbar-default pl-md-0 pr-md-0">
                        <button type="button" class="navbar-toggler navbar-toggler-right collapsed" data-toggle="collapse" data-target="#defaultNavbar2">
                            <span class="fa fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="defaultNavbar2">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="<?php echo e(url('/')); ?>" class="btn-features active nav-link">Home</a></li> 
                                            <li ><a href="<?php echo e(route('aboutus')); ?>" class="btn-features nav-link register" >About Us</a> 	</li>   
                                            <li ><a href="<?php echo e(route('HowItsWorks')); ?>" class="btn-features nav-link register" >How it works</a> 	
                                            </li>  
                            <li><a  href="<?php echo e(url('/Expl-Abbrev')); ?>" class=" nav-link" class="btn btn-default " type="button" data-toggle="dropdown" data-hover="dropdown"><?php echo e($settings->product_button); ?></a>  
                            <ul class="menu-bar">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="btn-features col-12">
                                        <a  href="<?php echo e(route('home.category.feature',$category->id)); ?>" ><?php echo e($category->category); ?></a>
                                        <div class="child-li">
                                            <ul class="navbar-nav">
                                        <?php $__currentLoopData = $Subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->category_id == $category->id): ?>
                                                    <li class="btn-features col-12 nav-item">
                                                        <a   href="<?php echo e(route('sub.category',$item->id)); ?>" ><?php echo e($item->Sub_Category); ?></a>
                                                    </li>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            </li>  
                                  
                            <?php if(Auth::guard('seller')->user() == false && Auth::guard('web')->user() == false): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('register.page')); ?>" class="nav-link register btn-features" >Register/Sign Up</a>                                  
                            </li> 
                            <?php endif; ?>
                        </ul>
                </div>
            </nav>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 pl-md-0 pr-md-0 startbuy">
            <form action="<?php echo e(route('search')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="search-sec">
                    <input type="text" placeholder="Search Products" class="minChar"  name="product_name" id="product_name"/>
                    <input type="submit"  value="Go" class="searchbtn" />
                    <span class="text-danger"> <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                </div>
                <div id="errmsg"></div>
            </form>
        </div>
    </div>
</div>
</div>
</header>	

<script type="text/javascript">
/****************LightGallery************************************/
// $(document).on('click' , '.auctionDataId' , function(){
//     var auction_id = $(this).attr('auction_id');
//     $.ajax({
//         type: "post",
//         url: baseURL +'home/getMultipleAuctionImage',	    
//         data: {'auctionID':auction_id},
//         dataType:'json',
//         success:function(data){
//             //console.log(data);
//             if(data.status == true)
//             {
//                 $(this).lightGallery({
//                     download: false,
//                     dynamic: true,
//                     mobileSrc:true,
//                     dynamicEl: data.auctionImage
//                 });
//             }
//             else
//             {
//                 //alert("Did not found multiple images of this auction.");
//             }
//         } 
//     });
// });
(function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});
})(jQuery)

function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
}

function triggerHtmlEvent(element, eventName) {
var event;
if (document.createEvent) {
    event = document.createEvent('HTMLEvents');
    event.initEvent(eventName, true, true);
    element.dispatchEvent(event);
    } else {
    event = document.createEventObject();
    event.eventType = eventName;
    element.fireEvent('on' + event.eventType, event);
}
}

jQuery('.lang-select').click(function() {
var theLang = jQuery(this).attr('data-lang');
jQuery('.goog-te-combo').val(theLang);

//alert(jQuery(this).attr('href'));
window.location = jQuery(this).attr('href');
location.reload();

});
/*$(document).ready(function () {
$("#errmsg").hide();
$(".minChar").keypress(function (e) {
$("#errmsg").hide();
$('#product_name').css('border-color', '');
});
});
function minThreeChar(){
if ($("#product_name").val().length < 3) {
$('#product_name').css('border-color', 'red');
$("#errmsg").html("Auction name is too short. Please enter minimum three characters.").show();
return false;
}
return true;
}*/

</script>


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

<?php /**PATH E:\xampp\htdocs\48-h\resources\views/48-h/header.blade.php ENDPATH**/ ?>