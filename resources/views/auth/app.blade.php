<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .navbar-brand{
            color :#FFF !important;
            /* border:1px solid #000; */
            border-radius:3px;
        }

        thead{
            font-size:12px;
            background:#e6ecef;
        }

        table>tbody{
            font-size:13px;
            font-weight:400;
            text-transform:normal;
        }

        .ulblock .nav-link{
            color:purple !important;
        }
</style>
</head>
<body>
    <div class="absolute-login-box">
        <div class="flex-container">
            <div class="box-login">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12  p-5">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <h4 class="font-weight-bold m-0" style="color:#f47">
                                       <a href="/"><img src="images/logo1.jpg?5a32fe3d3e2d2495d2e968f65f4b9fbe" width="150px"  alt=""></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <nav class="nav nav-tabs nav-justified ">
                                <a class="nav-link @if($_SERVER['REQUEST_URI'] == '/login') active @endif " style="font-size: 9px" href="/login">CONNEXION</a>
                                <a class="nav-link @if($_SERVER['REQUEST_URI'] == '/inscription') active @endif" style="font-size: 9px" href="/inscription">INSCRIPTION</a>
                            </nav>
                        </div>
                        <div class="col-sm-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="app">
        <div class="col-12">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 mt-4 flex-container">
                    <div class="card row box-login">
                        <div class="col-sm-12  p-3">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <p class="p-4 m-0" style="color:#f47; font-size:30px">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                        </svg>
                                        <span class="font-weight-bold" style="font-size:25px;">Job2maison</span>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div>
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div> --}}

</body>
</html>







