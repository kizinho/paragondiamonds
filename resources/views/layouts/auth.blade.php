<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<head>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset($settings['favicon']) }}">
    <link rel="shortcut icon" href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"   href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    @yield('title')                
            <link href="{{ asset("temp/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
            <!-- Icons -->
            <link href="{{ asset("temp/css/materialdesignicons.min.css")}}" rel="stylesheet" type="text/css" />
        
            <link rel="stylesheet" href="{{ asset("temp/css/line.css")}}">
            <!-- Main Css -->
            <link href="{{ asset("temp/css/style.css")}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset("temp/css/colors/default.css")}}" rel="stylesheet">
    <style>

        #snackbar_error {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: red;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
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
            margin-left: -125px;
            background-color: green;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
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
            width: 130px;
            height: 40px;
            background: transparent;
            border: 1px solid #701f2f !important;
            color: #ddd5d5;
            outline: none;
            border: none;
        }

        .goog-te-gadget div select option {
            border: 1px solid #701f2f !important;
        }

        .goog-te-gadget div select option:hover {
            cursor: pointer;
        }

        .goog-te-gadget div select:hover {
            border: 1px solid #701f2f !important;
            cursor: pointer;
        }
        .uk-container-expand,html {
    
    background: #222;
}


    </style>  

</head>
 <body class="bg-soft-primary">
  
    @yield('content')

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
    



                 <script src="{{ asset("temp/js/jquery-3.5.1.min.js")}}"></script>
            <script src="{{ asset("temp/js/bootstrap.bundle.min.js")}}"></script>
            
            <!-- SLIDER -->
            <script src="{{ asset("temp/js/owl.carousel.min.js")}}"></script>
            <script src="{{ asset("temp/js/owl.init.js")}}"></script>
            <!-- Icons -->
            <script src="{{ asset("temp/js/feather.min.js")}}"></script>
            <script src="{{ asset("temp/js/bundle.html")}}"></script>
            
            <script src="{{ asset("temp/js/app.js")}}"></script>
            <script src="{{ asset("temp/js/widget.js")}}"></script>


	

 
    <!-- Main file-->

   
  

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
 @if ($errors->has('email'))
 <script type="text/javascript">
    var message = "{!!  $errors->first('email') !!}";
    $("#snackbar_error").html(message);
    messageAlertError();
          
</script>
 
 @endif

    @if (session('status'))
 <script type="text/javascript">
    var message = "{!!  session('status') !!}";
    $("#snackbar_success").html(message);
    messageAlertSuccess();
</script>
 
 @endif
</body>
</html>
