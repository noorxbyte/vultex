<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vultex: {{ $title }}</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="/favicon.ico">

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- jQuery UI -->
    <script src="/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="/css/jquery-ui.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/themes/bootstrap-{{ $usertheme or 'cosmo' }}.css">

    <!-- custom css -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.js"></script>

    <!-- Table sort script -->
    <script src="/js/sorttable.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.6.0/jquery.matchHeight.js"></script>

    <!-- Search highlight script -->
    <script src=""></script>

    <!-- Custom scripts -->
    <script src="/js/scripts.js"></script>

</head>
<body>
    @include('_scripts')

    <div class="container">

        <!-- header -->
        <div id="header" class="text-center">
            <a href="/">
                <img src="/img/cover.png" alt="Vultex Cover" class="img-responsive cover"/>
            </a>
            <hr/>

            <!-- Navigation Bar -->
            @include('_navbar')

            @if(!Auth::check())
                <div class="bottom"><a class="invisible" id="login" href="{{ route('login') }}">Login</a></div>
            @endif

        </div>

        @if (Session::has('flash_message'))
            <div class="alert alert-success" id="flash_message">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <!-- mian body of page -->
        <div id="middle">
            <!-- page heading -->
            <h3>{{ $heading or 'ERROR' }}</h3><hr/>

            <!-- main content of page goes here -->
            @yield('content')
            
        </div>

        <br><br><br>
        <hr style="height:2px;border:none;color:#C0C0C0;background-color:#C0C0C0;" />

        <div id="footer" class="container-fluid">
            @include('_footer')
            <!-- footer -->
            <div id="bottom"><hr/>Copyright © 2015 Vultex</div>
        </div>

    </div>
</body>
</html>