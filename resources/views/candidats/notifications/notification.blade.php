@extends('candidats.app',['title'=>'Notification','style'=>[]])

@section('candidat')
    <notifcandidat-component :notif="{{json_encode($notif ?? '')}}"
    ></notifcandidat-component>
@endsection
