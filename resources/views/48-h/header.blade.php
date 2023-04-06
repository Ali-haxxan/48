<header>
    <div class="topheader">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 pl-md-0 pr-md-0 topheader-inner">
                    <nav class="navbar navbar-expand-md navbar-default pl-md-0 pr-md-0 d-flex justify-content-end">
                        {{-- <button type="button" class="navbar-toggler navbar-toggler-right collapsed" data-toggle="collapse" data-target="#defaultNavbar1">
                            <span class="fa fa-bars"></span>
                        </button> --}}
                        <div  >
                            {{-- <ul class="tcenter navbar-nav navbar-right ml-auto"> --}}
                                @if ( Auth::guard('seller')->user() == false && Auth::guard('web')->user()== false )
                                <a style="text-decoration: none; color:black;font-size: 19px;"  href="{{route('user.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a>
                                @endif
                                @if ( Auth::guard('seller')->user() == true && Auth::guard('web')->user()== true)
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="{{route('user.home')}}"><i class="fa fa-home"></i> My 4<sup><b>8</sup>-</b>h (buyer)</a> <b>|</b>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="{{route('seller.home')}}"><i class="fa fa-home"></i> My 4<sup><b>8</sup>-</b>h (seller)</a> <b>|</b>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="{{route('user.watchList')}}"><i class="fa fa-heart"></i> wishlist</a><b>|</b>
                                <a  style="text-decoration: none; color:black;font-size: 19px;" href="{{route('seller.logout')}}" >Logout</a>
                                @endif
                                @if ( Auth::guard('seller')->user() == false && Auth::guard('web')->user()== true)
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="{{route('user.home')}}"><i class="fa fa-home"></i> My 4<sup><b>8</sup>-</b>h</a> <b>|</b>
                                <a class="btn-features" style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="{{route('user.watchList')}}"><i class="fa fa-heart"></i> wishlist</a><b>|</b>
                                <a class="btn-features"  style="text-decoration: none; color:black;font-size: 19px; padding-left: 10px; padding-right: 10px;" href="{{route('user.logout')}}" ><i class="fa fa-sign-out"></i>Logout</a>
                                @endif                                     
                            {{-- </ul> --}}
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
                    <a title="Home" href="{{url('/')}}">
                        <img  src="{{asset('logo/'.$settings->logo)}}" alt="logo" />
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 pl-md-0 pr-md-0 nav-sec">
                    <nav class="navbar navbar-expand-md navbar-default pl-md-0 pr-md-0">
                        <button type="button" class="navbar-toggler navbar-toggler-right collapsed" data-toggle="collapse" data-target="#defaultNavbar2">
                            <span class="fa fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="defaultNavbar2">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="{{url('/')}}" class="btn-features active nav-link">Home</a></li> 
                                            <li ><a href="{{route('aboutus')}}" class="btn-features nav-link register" >About Us</a> 	</li>   
                                            <li ><a href="{{route('HowItsWorks')}}" class="btn-features nav-link register" >How it works</a> 	
                                            </li>  
                            <li><a  href="{{url('/Expl-Abbrev')}}" class=" nav-link" class="btn btn-default " type="button" data-toggle="dropdown" data-hover="dropdown">{{$settings->product_button}}</a>  
                            <ul class="menu-bar">
                                @foreach ($categories as $category)
                                    <li class="btn-features col-12">
                                        <a  href="{{route('home.category.feature',$category->id)}}" >{{$category->category}}</a>
                                        <div class="child-li">
                                            <ul class="navbar-nav">
                                        @foreach ($Subcategories as $item)
                                            @if ($item->category_id == $category->id)
                                                    <li class="btn-features col-12 nav-item">
                                                        <a   href="{{route('sub.category',$item->id)}}" >{{$item->Sub_Category}}</a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                    </li>
                                @endforeach
                            </ul>
                            </li>  
                                  
                            @if (Auth::guard('seller')->user() == false && Auth::guard('web')->user() == false)
                            <li class="nav-item">
                                <a href="{{route('register.page')}}" class="nav-link register btn-features" >Register/Sign Up</a>                                  
                            </li> 
                            @endif
                        </ul>
                </div>
            </nav>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 pl-md-0 pr-md-0 startbuy">
            <form action="{{route('search')}}" method="post">
                @csrf
                <div class="search-sec">
                    <input type="text" placeholder="Search Products" class="minChar"  name="product_name" id="product_name"/>
                    <input type="submit"  value="Go" class="searchbtn" />
                    <span class="text-danger"> @error('product_name'){{$message}}@enderror</span>
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
{{-- <script type="text/javascript" src="{{url('../translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit')}}"></script>	 --}}

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

{{-- ////////////////////////// header end ///////////////////// --}}