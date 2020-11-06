@extends('auth.app',['title'=>'Page de connexion','style'=>[]])

@section('content')

<div id="app">
    <div class="absolute-login-box">
        <div class="flex-container">

            <div class="box-login">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12  p-3 border-bottom">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <h1 class="font-weight-bold m-0" style="color:#20123a">Job2maison</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p class="text-center">Mot de passe recruteur ou candidat ?</p>
                        </div>
                        @if(session('message'))
                            <div class="alert alert-warning alert-dismissible fade show ml-2" role="alert">
                                <div>{{session('message')}}</div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="col-sm-12 border-bottom">
                            <form action="{{route('resetpassword')}}" method="POST" enctype="multipart/form-data" class='form-group'>
                                @csrf
                                <input type="email" style="border:1px solid #ccc" name="email" value="{{old('email')}}" autofocus  class="form-control mt-4 input @error('email') is-invalid @enderror" placeholder=" email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="submit" class='btn btn-success btn-block mt-4 btn-lg'>
                                    {{ __('Valider') }}
                                </button>
                            </form>
                        </div>



                        <div class="col-12">
                        {{-- <p class="mt-3 text-center display-4" style="font-size:12px;color:#0073b0">Insciption (Canditat ou recruteur)</p> --}}
                        <div class="row">
                            <div class="col-6 mt-3 mb-3" style="font-size:12px;color:#20123a"><a href="/login">Connexion</a></div>
                            <div class="col-3"></div>
                            <div class="col-3 mt-3" style="font-size:12px;color:#20123a"> <a href="/inscription">Inscription</a></div>
                        </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
