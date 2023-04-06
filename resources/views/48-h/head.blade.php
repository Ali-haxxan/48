<!doctype html>
<html>
	
<!-- Mirrored from 48-h.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 19:52:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$settings->title}}</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('logo/'.$settings->logo)}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/main/css/auction.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/sweetalert/sweetalert.css')}}" />
    <link rel="stylesheet" href="{{asset('48h/assets/site/lightgallery/css/lightgallery.css')}}" />
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <script src="{{asset('48h/assets/site/main/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/bootstrap.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/custom.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/script.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/sha.js')}}"></script>
    <script src="{{asset('48h/assets/site/main/js/owl.carousel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <script src="{{asset('48h/assets/site/sweetalert/sweetalert.js')}}" type="text/javascript"></script>
    <script src="{{asset('48h/assets/site/lightgallery/js/lightgallery-all.min.js')}}" type="text/javascript"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     --}}

    <script>
        $(function() { $('.alert').delay(5000).fadeOut(5000); });
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
            min-width: 160px;
            margin-left: 118px;
            margin-top: -34px;
        }
        .menu-bar li:hover .child-li ul{
            display: block;
        }

        </style>
</head>
<script>var baseURL = '{{url('/')}}';</script>
		<body class="bodybg">