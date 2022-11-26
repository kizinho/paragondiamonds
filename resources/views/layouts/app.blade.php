<!DOCTYPE html>
<html  id="top" class="home-section home-page home-template" direction="ltr" env="" xmlns:og="//opengraphprotocol.org/schema/" lang="{{ str_replace('_', '-', app()->getLocale()) }}" />
<head>
<meta name="viewport" content="width=1024" />
      <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="480" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset($settings['favicon']) }}">
    <link rel="shortcut icon" href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"   href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    <link rel="apple-touch-icon"  href="{{asset($settings['favicon']) }}">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset("frontend/use.fontawesome.com/releases/v5.6.3/css/all.css")}}" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset("frontend/site/assets/pwpc/pwpc-7ce1a2c9d24a928d1fe2b3a8ef2135352e4c1323.css")}}" />
     <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <style>
        .text-blue-500 {
    color: #205b66!important;
}
        .bg-blue-500 {
    background-color: #0691ab!important;
}
        .home-page .features .feature a {
    border: 1px solid #cfdce1 !important;
    color: #fff!important
}
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
    .bg-primary{
        background-color: #102274 !important;
        background: #102274 !important;
    }
    .bg-secondary{
        background-color: #6C757D !important;
        background: #6C757D !important;
    }
    .bg-success{
        background-color: #28A745 !important;
        background: #28A745 !important;
    }
    .bg-info{
        background-color: #10156d !important;
        background: #10156d !important;
    }
    .bg-warning{
        background-color: #0747ff !important;
        background: #0747ff !important;
    }
    .bg-danger{
        background-color: #7d141e !important;
        background: #7d141e !important;
    }
    .bg-light{
        background-color: #F8F9FA !important;
        background: #F8F9FA !important;
    }
    .bg-dark{
        background-color: #25c676 !important;
        background: #25c676 !important;
    }

    .text-primary{
        color: #102274 !important;
    }
    .text-secondary{
        color: #6C757D !important;
    }
    .text-success{
        color: #28A745 !important;
    }
    .text-info{
        color: #10156d !important;
    }
    .text-warning{
        color: #0747ff !important;
    }
    .text-danger{
        color: #7d141e !important;
    }
    .text-light{
        color: #F8F9FA !important;
    }
    .text-dark{
        color: #25c676 !important;
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
            border: 1px solid #0691ab !important;
            color: #0691ab;
            outline: none;
           
            border: none;
        }

        .goog-te-gadget div select option {
            border: 1px solid #0691ab !important;
        }

        .goog-te-gadget div select option:hover {
            cursor: pointer;
        }

        .goog-te-gadget div select:hover {
            border: 1px solid #0691ab !important;
            cursor: pointer;
        }
</style>

</head>
<body>
    <div class="uk-offcanvas-content">
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
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
  
    <script src="{{ asset("frontend/site/assets/pwpc/pwpc-2719044506332095392e489bb4b266ecd5eef64f.js")}}"></script>
    <script src="https://cdn.adnetcms.com/lib/adnetapi/js/stockquotes.min.js" async defer></script> 
   
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
        jQuery("#snackbar_error").html(message);
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
     @if ($errors->has('totp'))
 <script type="text/javascript">
    var message = "{!!  $errors->first('totp') !!}";
    $("#snackbar_error").html(message);
    messageAlertError();
          
</script>
 
 @endif
</body>
</html>
