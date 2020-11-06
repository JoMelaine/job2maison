@extends('recruteur.app',['title'=>'Profil du recruteur','style'=>[]])

@section('recruteur')

    <infosrecruteur-component :infos="{{json_encode($infos ?? '')}}"
    :tab_genre="{{json_encode($tab_genre ?? '')}}"
    :marital_status="{{json_encode($marital_status ?? '')}}"
    :token="{{json_encode($token ?? '')}}" ></infosrecruteur-component>

@endsection
