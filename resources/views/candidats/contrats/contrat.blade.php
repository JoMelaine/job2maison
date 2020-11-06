@extends('candidats.app',['title'=>'Contrat','style'=>[]])

@section('candidat')
    <contratcandidat-component :contrat="{{json_encode($contrat ?? '')}}"></contratcandidat-component>
@endsection
