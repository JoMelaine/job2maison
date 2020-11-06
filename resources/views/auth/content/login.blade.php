@extends('auth.app',['title'=>'Page de connexion','style'=>[]])

@section('content')

    <div>
        <div class="col-sm-12">
            <p class="text-center pt-4" style="font-size: 12px" >Connectez vous en tant que recruteur ou candidat ?</p>
        </div>
        @if(session('message'))
            <div class="alert alert-warning alert-dismissible fade show ml-2" role="alert">
                <div>{{session('message')}}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-sm-12">
            <form action="{{route('connexion')}}" method="POST" class="form_connexion">
                @csrf
                <div class="form-group">
                  <input type="email" name="email"  value="{{old('email')}}" class="form-control input_con @error('email') is-invalid @enderror" placeholder="Email" >
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" name="pwd" value="{{old('pwd')}}"  class="form-control input_con  @error('pwd') is-invalid @enderror" placeholder="Mot de passe" >
                  @error('pwd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="d-flex bd-highlight py-3">
                    <div class="mr-auto p-2 bd-highlight">
                        <a href="/mot_de_passe_oublie"  style="font-size: 12px" >Avez vous oublié votre mot de passe ?</a>
                    </div>
                    <div class="p-2 bd-highlight">
                        <button type="submit" class='btn btn-success btn_con btn-block btn-lg '>
                            {{ __('Connexion') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
