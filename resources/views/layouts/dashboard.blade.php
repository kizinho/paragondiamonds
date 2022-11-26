<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<head>
     @can('isAdmin') 
    <meta name="viewport" content="width=1024" />
      @endcan
     @can('isUser')
    <meta name="viewport" content="width=1024" />
        @endcan
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset($settings['favicon']) }}">
    <link rel="shortcut icon" href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"   href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
   <title>{{ucfirst($settings['site_name'])}} ::: {{Auth::user()->last_name}} {{Auth::user()->first_name}}</title>
<meta name="description" content="{{ucfirst($settings['site_name'])}}  {{Auth::user()->last_name}} {{Auth::user()->first_name}}">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}}::  {{Auth::user()->last_name}} {{Auth::user()->first_name}}"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
 @can('isAdmin') 
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/fonts.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/flaticon.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font-awesome.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/nice-select.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/datatables.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dropify.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/responsive.css')}}" />
    <style>
        .l-main{
            margin-top: 200px;
        }
    </style>
    @endcan
 @can('isUser')
 
         <!-- Bootstrap Css -->
        <link href="{{ asset('user/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('user/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('user/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        
         <style>
            .page-item.active .page-link {
    background-color: #2596be!important;
    border-color: #2596be!important;
}
            .bg-primary.bg-soft {
    background-color: rgb(181 113 29 / 15%)!important;
}
            .bg-primary {
     background-color: #2596be!important; 
}
.text-info{
    color: #2596be!important;  
}
.page-content,body{
      color: #d5d9dd!important;
     background-color:#4c4d51;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6,.btn-close {
    color: #ddd5d5 !important;
}
.card,.modal-content{
    background-color: #555d64!important
}
.text-muted {
    color: #c2c3cb!important;
}
.table-nowrap td, .table-nowrap th,.form-control ,.input-group-text {
   background-color:#555d64;
     color: #ddd5d5 !important;
}
.input-group-text:hover {
   background-color:#555d64;
     color: #ddd5d5 !important;
}
.form-control:active {
   background-color:#555d64;
     color: #ddd5d5 !important;
}
.form-control:hover {
   background-color:#555d64;
     color: #ddd5d5 !important;
}
a:hover,.text-body {
    color: #2596be!important;
}
.table-nowrap td, .table-nowrap th, .form-control, .input-group-text {
     color: #ddd5d5 !important;
}
.footer {
    color: #ddd5d5 !important;
    background-color: #4c4d51!important;
}
#profile {
  padding: 10px;
  color: #ddd5d5 !important;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border: 1px dashed #BBB;
  text-align: center;
  background-color: #4c4d51;
  cursor: pointer;
}
.btn-info {
    color: #ddd5d5 !important;
    background-color: #2596be!important;
    border-color: #2596be!important;
}
.btn-info, a:hover {
    color: #ddd5d5 !important;
}
.form-control:disabled, .form-control[readonly] {
   background-color:#555d64;
    opacity: 1;
}
.card-title-desc {
    color: #d4dfd6;
}

        </style>
         
        
  </head>
 @endcan
    <style>

        #snackbar_error {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #f46a6a!important;
            color: #555d64;
            border-radius: 1px;
            text-align: center;
            border-radius: 2px;
            padding: 10px;
            position: fixed;
            z-index: 2000;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar_error.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }
        #snackbar_success {
            visibility: hidden;
            min-width: 250px;
             border-radius: 1px;
            margin-left: -125px;
            background-color: #34c38f!important;
            color:  #555d64;
            text-align: center;
            border-radius: 2px;
            padding: 10px;
            position: fixed;
            z-index: 2000;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar_success.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        #google_translate_element {
            position: relative;
        }

        .goog-logo-link {
            display: none !important;
        }

        .goog-logo-link #text {
            display: none !important;
        }

        .goog-te-gadget {
            font-size: 0px !important;
        }

        .goog-te-gadget div {
            display: inline;
        }

        .goog-te-gadget div select {
            width: 136px;
            height: 30px;
            border: 1px solid #2596be !important;
              color: #ddd5d5;
                background: transparent;
            outline: none;
            border: none;
        }

        .goog-te-gadget div select option {
            border: 1px solid #2596be !important;
        }

        .goog-te-gadget div select option:hover {
            cursor: pointer;
        }

        .goog-te-gadget div select:hover {
            border: 1px solid #2596be !important;
            cursor: pointer;
        }
    </style>  

</head>
 @can('isAdmin') 
<body>
    <!-- preloader Start -->
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status">
            <img src="{{ asset('admin/images/loader.gif')}}" style="width:120px;height:120px" id="preloader_image" alt="loader">
        </div>
    </div>
    <div class="cursor"></div>
    <!-- Top Scroll Start -->
    <a href="javascript:" id="return-to-top"> <i class="fas fa-angle-double-up"></i></a>
    <!-- Top Scroll End -->

    @include('layouts.admin-nav')
    @yield('content')
 
    @endcan
    @can('isUser')
        <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
   
    @include('layouts.nav-user')
    @yield('content')
  
    @include('layouts.user-footer')
    
    
        </div>
    
    
    
    
    
    @endcan
  </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div id="snackbar_error"></div>
    <div id="snackbar_success"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
     @can('isAdmin')
    <script src="{{ asset('admin/js/jquery-3.3.1.min.js')}}"></script>
     <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/modernizr.js')}}"></script>
	<script src="{{ asset('admin/js/dropify.min.js')}}"></script>
	<script src="{{ asset('admin/js/owl.carousel.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.countTo.js')}}"></script>
	<script src="{{ asset('admin/js/plugin.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.inview.min.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('admin/js/datatables.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.menu-aim.js')}}"></script>
    <script src="{{ asset('admin/js/custom.js')}}"></script>
  <script>
    $(document).ready(function() {
    $('.render').DataTable( {
           order: [[ 5, "asc" ]],
    } );
} );
$(document).ready(function() {
    $('.withdraw').DataTable( {
           order: [[ 10, "asc" ]],
    } );
} );
    </script>
    <script>
        $(".deleted").on("submit", function () {

            return confirm("Are you sure?");
        });
    </script>

    <script>
        $(".deleted-list").on("submit", function () {

            return confirm("Are you sure?");
        });
    </script>
    <script>
        $('#myModal').appendTo("body").modal('show');
    </script>

    @endcan
     @can('isUser')
       <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('user/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('user/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('user/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('user/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('user/assets/libs/node-waves/waves.min.js')}}"></script>

      

        <!-- App js -->
        <script src="{{ asset('user/assets/js/app.js')}}"></script>
  <script>
        $(".w-r").on("click", function () {

            return confirm("Are you sure you want to remove this wallet address?");
        });
         $(".w-p").on("click", function () {

            return confirm("Are you sure you want to remove this wallet as preferable?");
        });
    </script>
     <script>
        $(".cap").on("click", function () {

            return confirm("Are you sure that you want to withdraw your capital, we check if your capital has been matured");
        });
    </script>

        <script>
     function getFile() {
  document.getElementById("upfile").click();
}

function sub(obj) {
  var file = obj.value;
  var fileName = file.split("\\");
  document.getElementById("profile").innerHTML = fileName[fileName.length - 1];
  $(".profile").show();
}   
        </script>
 
 @endcan

    @yield('script')
    <script>
        $(".deleted-list").on("submit", function () {

            return confirm("Are you sure?");
        });

        function messageAlertError() {
            var x = document.getElementById("snackbar_error");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 5000);
            $(".modal").hide();
        }
        function messageAlertSuccess() {
            var x = document.getElementById("snackbar_success");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 5000);
            $(".modal").hide();
        }
    </script>
    @if(session()->has('message.level'))
    <script type="text/javascript">
        var message = "{!! session('message.content') !!}";
        $("#snackbar_error").html(message);
                @if (session('message.level') == 'error')
        messageAlertError();
                @else
        $("#snackbar_success").html(message);
        messageAlertSuccess();
        @endif

    </script>

    @endif

</body>
</html>
