<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
            @guest
                body,html{
                    background:#f7f7f8;
                }
            @endguest

            .navbar-brand{
                color :#fff !important;
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
                color:#fff !important;
            }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top navbar-light sticky-top shadow-sm" style="background:white;min-height:65px">
            <a class="navbar-brand mx-3" href="/">
                <img src="../images/logo1.jpg?5a32fe3d3e2d2495d2e968f65f4b9fbe" width="120px"  alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mx-5">
              </ul>
              <div class=" my-2 my-lg-0">
                <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->

                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/candidate/contract') action_url @endif" >
                        <a class="nav-link" style="color:#20123a; font-weight:700" href="/candidate/contract">Contrats</a>
                    </li>
                    <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/candidate/notification') action_url @endif">
                        <a class="nav-link" style="color:#20123a; font-weight:700" href="/candidate/notification">Notification</a>
                    </li>

                    <li class="nav-item dropdown @if($_SERVER['REQUEST_URI'] == '/candidate/showinfo') action_url @endif">
                        <a class="nav-link dropdown-toggle" style="color:#20123a; font-weight:700" href="#" type="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{session()->get('uname')}}
                        </a>
                        <div class="dropdown-menu shadow-lg" style="border:0" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item " href="/candidate/showinfo">Profil</a>
                            <a class="dropdown-item" href="/deconnexion">Deconnexion</a>
                        </div>
                    </li>
                </ul>
              </div>
            </div>
        </nav>


        <main class="py-4 mt-2 ">
            @yield('candidat')
        </main>
    </div>
</body>
