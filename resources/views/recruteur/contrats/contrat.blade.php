@extends('recruteur.app',['title'=>'Profil du recruteur','style'=>[]])

@section('recruteur')
<contratrecruteur-component :data="{{json_encode($data ?? '')}}"></contratrecruteur-component>

@endsection
