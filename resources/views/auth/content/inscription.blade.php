@extends('auth.app',['title'=>"Page d'inscription",'style'=>[]])

@section('content')

<div>
    <div class="col-sm-12 mt-4">
        <p class="text-center p-3" style="font-size: 12px">Inscrivez vous en tant que recruteur ou candidat ?</p>
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
        <form action="{{route('created_Account')}}" enctype="multipart/form-data" method="POST" class="form_connexion">
            @csrf
            <div class="form-group">
              <select name="acc" class=" form-control input_con">
                <option value="">Choisir le type de compte...</option>
                <option value="1">Candidat</option>
                <option value="2">Recruteur</option>
            </select>
            </div>
            <div class="form-group">
              <input type="text" name="nom" class="form-control input_con @error('nom') is-invalid @enderror " value="{{old('nom')}}"  placeholder="Nom">
              @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
              @enderror
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control input_con @error('email') is-invalid @enderror"  value="{{old('email')}}" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="pwd" class="form-control input_con @error('pwd') is-invalid @enderror"   value="{{old('pwd')}}" placeholder="Mot de passe">
                @error('pwd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex bd-highlight py-3">
                <div class="mr-auto p-2 bd-highlight">
                    <input type="checkbox" name="cgu" style="font-size: 12px" value="1">
                    <a href="/cgu"  style="font-size: 12px" >J'accepte les conditions d'utilisation </a>

                </div>
                <div class="p-2 bd-highlight">
                    <button type="submit" class='btn btn-success btn-block btn_con btn-lg'>
                        {{ __('Inscription') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
