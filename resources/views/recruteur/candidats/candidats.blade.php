@extends('recruteur.app',['title'=>'Profil du recruteur','style'=>[]])

@section('recruteur')
    <listcandidat-component :metier="{{json_encode($metier ?? '')}}"
    :candidat="{{json_encode($candidat ?? '')}}" :salaire="{{json_encode($salaire ?? '')}}"
    :ville="{{json_encode($ville ?? '')}}" :token="{{json_encode($token ?? '')}}"
    :message="{{json_encode(session('message') ?? '')}}" :tab_search="{{json_encode(session('tab_search') ?? '')}}">
    </listcandidat-component>

@endsection
