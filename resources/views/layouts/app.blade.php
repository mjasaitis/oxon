<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.css"/>

    <!-- Scripts -->
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>    
    {{-- <script src="/js/app.js"></script>     --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.js"></script>


    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        
                        @if (Auth::guest())
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li >
                                <span class="username">{{ Auth::user()->name }}</span>
                            </li>
                            @if( Auth::user()->hasPermission('video_admin') )
                            <li >
                                <a href="{{ url('/admin/videos') }}" role="button" aria-expanded="false">Admin</a>
                            </li>
                            @endif
                            <li >
                                <a href="{{ url('/logout') }}" role="button" aria-expanded="false">Logout</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


</body>
</html>
