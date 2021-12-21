<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme" color="{{env('APP_THEME')}}">

    <title>{{ config('app.name', 'Laravel') }} | {{ isset($title) ? $title : 'Home' }}</title>

    <!-- Styles -->
    <link type="text/css" href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet">
    
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS file-->

     <!-- jquery-confirm -->
    <link type="text/css" href="{{ asset('css/jquery-confirm.min.css') }}" rel="stylesheet">

    @stack('css')
</head>
<body>
    <div class="wrapper @guest wrapper-full-page @endguest">
        @auth
            @include('layouts.navbars.sidebar')
        @endauth
        <div class="@auth main-panel @endauth">
            @include('layouts.navbars.navbar')
            @yield('content')
            @include('layouts.footer.nav')
        </div>
    </div>
</body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <!--  jVector Map  -->
    <script src="{{ asset('js/plugins/jquery-jvectormap.js') }}" type="text/javascript"></script>
    <!--  Share Plugin -->
    <script src="{{ asset('js/plugins/jquery.sharrre.js') }}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <!--  DatetimePicker   -->
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}"></script>
    <!--  Sweet Alert  -->
    <script src="{{asset('js/plugins/sweetalert2.min.js') }}" type="text/javascript"></script>
    <!--  Tags Input  -->
    <script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <!--  Sliders  -->
    <script src="{{ asset('js/plugins/nouislider.js') }}" type="text/javascript"></script>
    <!--  Bootstrap Select  -->
    <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
    <!--  jQueryValidate  -->
    <script src="{{ asset('js/plugins/jquery.validate.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
    <!--  Bootstrap Table Plugin -->
    <script src="{{ asset('js/plugins/bootstrap-table.js') }}"></script>
    <!--  DataTable Plugin -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <!--  Full Calendar   -->
    <script src="{{ asset('js/plugins/fullcalendar.min.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
    <!-- Light Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('js/demo.js') }}"></script>

    <!-- jquery-confirm ! -->
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('js/dialog.js') }}"></script>

    <!-- Custom functions -->
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('js')
</html>
