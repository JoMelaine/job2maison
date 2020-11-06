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
    <div id="app">

        <nav class="navbar navbar-expand-md fixed-top navbar-light sticky-top shadow-sm" style="background:white;min-height:65px">
            <a class="navbar-brand mx-3" href="/">
                <img src="images/logo1.jpg?5a32fe3d3e2d2495d2e968f65f4b9fbe" width="150px"  alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mx-5">
              </ul>
              <div class=" my-2 my-lg-0">
                @if(!session()->get('code'))
                    <a href="/login" class="mx-5 btn btn-primary btn-connect" >Connexion</a>
                @else
                    <a class="mx-5 btn btn-primary btn-connect" href="/candidate/showinfo">{{session()->get('uname')}}</a>
                @endif
              </div>
            </div>
        </nav>

        <main>
            <div class="card contenu">
                <!--   <img src="images/gouvernante.jpg?1d1a52d253ebba0dab9ffb5d8b3eb11a" class="img" alt="Cinque Terre"> -->
                  <div class="card-img-overlay">
                      <div class="center">
                          <p class="px-4 text-white p-item text-center">1<sup>ère</sup> Plateforme de mise en relation d'Employeur et de Candidat pour Emploi de Maison</p>
                          <p class="px-4 p2-item text-center">Trouvez votre personnel de maison en 2 clics</p>
                          <div class="px-4 text-center">
                              <form action="{{route('searchhome')}}" enctype="multipart/form-data" method="POST" >
                                @csrf
                                  <select class="selectpicker " data-live-search="true" name="job">
                                      @foreach ($data as $item)
                                        <option value="{{$item['job_name']}}">{{$item['job_name']}}</option>
                                      @endforeach
                                  </select>
                                   <select class="selectpicker " data-live-search="true" name="ville">
                                        @foreach ($ville as $item)
                                            <option  value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                  </select>
                                  <input  name="salaire" class="input_search" placeholder="Salaire proposé">
                                  <button type="submit" class="btn btn-primary btn-search">Rechercher</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

            <home-component :data="{{json_encode($data ?? '')}}" :ville="{{json_encode($ville ?? '')}}"
                            :cand="{{json_encode($cand ?? '')}}" :token="{{json_encode($token ?? '')}}"
                            :tab_search="{{json_encode(session('tab_search') ?? '')}}"
                            :job="{{json_encode(session('job') ?? '')}}"
                            :salaire="{{json_encode(session('salaire') ?? '')}}"
                            :villes="{{json_encode(session('villes') ?? '')}}"></home-component>

            {{-- <div>
                <div class="card contenu">
                    <img src="images/menu.gif?d15729488cfec612b10f7b1b30951c5d" class="img" alt="Cinque Terre" height="650">
                    <div class="card-img-overlay">
                        <div class="center">
                            <p class="px-4" style="width: 70%" >Trouvez un employer  sur la compétence recherchée, où vous le voulez avec Job de Maison</p>
                            <div class="px-4">
                                <form action="">
                                    <select class="selectpicker input_search" data-live-search="true">
                                        @foreach ($data as $item)
                                            <option value="{{$item['task_name']}}">{{$item['task_name']}}</option>
                                        @endforeach
                                    </select>
                                    <input  value="" placeholder="Tranche salariale">
                                    <select class="selectpicker" data-live-search="true">
                                        @foreach ($ville as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </form>

                            </div>
                            <button class="btn btn-primary mx-4">Rechercher</button>
                        </div>


                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row p-4">
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <h1 class="text-center">Candidats à la une</h1>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="images/logo1.jpg?5a32fe3d3e2d2495d2e968f65f4b9fbe" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="images/logo1.jpg?5a32fe3d3e2d2495d2e968f65f4b9fbe" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="images/logo1.jpg?5a32fe3d3e2d2495d2e968f65f4b9fbe" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>

            </div> --}}

            {{-- <div class="contenu">
                    <img src="images/menu.gif?d15729488cfec612b10f7b1b30951c5d" class="img" alt="Cinque Terre" width="1000" height="200">
                    <p class="center">Trouvez un employer  sur la compétence recherchée, où vous le voulez avec Job de Maison</p>
                    <div class="col-sm-12 contenu-input">
                        <div class="row">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Rechercher">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Rechercher">
                            </div>

                        </div>
                    </div>

                </div> --}}
        </main>

    </div>
    {{-- <div id="app">
            <nav class="navbar navbar-expand-md fixed-top navbar-light sticky-top shadow-sm" style="background:#20123a;min-height:65px">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <p class="m-0" style="color:#fff; font-weight:700 "> {{ __('Job2Maison') }}</p>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>



                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->

                            <li class="nav-item">
                                <a class="nav-link" style="color:#e30d6a; font-weight:700" href="#">Aide</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:#e30d6a; font-weight:700" href="#">FAQ</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" style="color:#e30d6a; font-weight:700" href="/login" >Connexion</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>



        <main>
            <div>
                <div class="contenu">
                    <img src="images/menu.gif?d15729488cfec612b10f7b1b30951c5d" class="img" alt="Cinque Terre" width="1000" height="200">
                    <p class="center">Job de Maison</p>
                    <div class="col-12 p-4 contenu-input">
                        <div class="row">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Rechercher">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Rechercher">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Rechercher">
                            </div>
                            <button class="btn btn-success col-3">Rechercher</button>
                        </div>
                    </div>

                </div>


                <div class="col-12">
                    <div class="row shadow-sm">
                        <div class="col-6">
                            <p class="title" >Présentation</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam laudantium eius consequuntur
                                vero totam, molestiae eveniet. Quia minus commodi quam maxime reiciendis. Reiciendis dignissimos optio sed eius a quam ad.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quasi doloribus tenetur expedita beatae qui vel similique
                                voluptatibus voluptatem exercitationem amet nostrum dolor nisi quas, molestias esse velit sequi ullam!
                            </p>
                        </div>
                        <div class="col-6 presentation-img p-0">
                            <img height="100%" width="100%" src="/images/maison.jpg?56fba054ce638322b67f4bd0155cdd09" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> --}}


</body>
</html>

