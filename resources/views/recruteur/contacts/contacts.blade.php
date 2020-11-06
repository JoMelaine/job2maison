@extends('recruteur.app',['title'=>'Profil du recruteur','style'=>[]])

@section('recruteur')
    <contactrecruteur-component :cand="{{json_encode($cand ?? '')}}" :token="{{json_encode($token ?? '')}}"
        :tab_cand="{{json_encode($tab_cand ?? '')}}" :sms_contrat="{{json_encode(session('sms_contrat') ?? '')}}"
        :sms_cont="{{json_encode(session('sms_cont') ?? '')}}">
    </contactrecruteur-component>
{{-- <div class="container col-12">
    <div class="row">
        <div class="col-8">
            @foreach ($tab_cand as $item)
                <div class="card mt-3" >
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            @if($item['cand_photo'])
                                <img src="{{url('storage')."/".$item['cand_photo']}}" class="card-img" alt="photo_candidat">
                            @else
                                <svg  viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h4 class="card-title">{{$item['cand_name']}}</h4>
                                <p>{{$item['cand_address']}} {{$item['cand_city']}} {{$item['cand_town']}} {{$item['cand_country']}}</p>
                                <p class="card-text">Sexe: <small class="text-muted">{{$item['cand_gender']}}</small></p>
                                @if($item['cand_birthday'])
                                    <p class="card-text">Date de naissance: <small class="text-muted">{{$item['cand_birthday']}}</small></p>
                                @endif
                                @if($item['cand_birthplace'])
                                    <p class="card-text">Lieu de naissance: <small class="text-muted">{{$item['cand_birthplace']}}</small></p>
                                @endif

                                @if($item['cand_descrip'])
                                    <p class="card-text">Description: <small class="text-muted">{{$item['cand_descrip']}}</small></p>
                                @endif
                                @if($item['cand_job'])
                                    <p class="card-text">Job: <small class="text-muted">{{$item['cand_job']}}</small></p>
                                @endif
                                @if($item['cand_job_tasks'])
                                    <p class="card-text">Job_tasks: <small class="text-muted">{{$item['cand_job_tasks']}}</small></p>
                                @endif
                                @if($item['cand_job_time'])
                                    <p class="card-text">Job_time: <small class="text-muted">{{$item['cand_job_time']}}</small></p>
                                @endif
                                @if($item['cand_diploma'])
                                    <p class="card-text">Diplome: <small class="text-muted">{{$item['cand_diploma']}}</small></p>
                                @endif
                                @if($item['cand_job_time'])
                                    <p class="card-text">Salaire: <small class="text-muted">{{$item['cand_salary']}}</small></p>
                                @endif
                                @if($item['cand_available'])
                                    <p class="card-text">Handicap: <small class="text-muted">{{$item['cand_available']}}</small></p>
                                @endif
                                <form action="{{route('voir_contact')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item['provlinks_id']}}">
                                    <input type="hidden" name="code" value="{{$item['cand_code']}}">
                                    <button type="submit" class="btn btn-primary">Voir le contact</button>
                                </form>
                                <a class="btn btn-primary mt-3" href="/employer/delete/contact/{{$item['provlinks_id']}}">Supprimer</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4">
            <div class="card mt-3 " >
                @foreach ($cand as $item)
                <div class="card-body border-bottom">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title" style="color: #e30d6a">{{$item['cand_name']}}</h5>

                        <form action="{{route('delete_contact')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" value="{{$item['link_id']}}" name="id">
                            <button class="btn btn-link" style="color: black">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>


                    </div>

                    <p class="card-text m-0">{{$item['cand_phone1']}}</p>
                    <p class="card-text mb-3">{{$item['cand_email']}}</p>
                    <div class="d-flex justify-content-between">
                        <div class="pt-4">
                            <form action="{{route('proposer_contract')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" value="{{$item['link_id']}}" name="id">
                                <button type="submit" class="btn btn-link">{{__('Proposer un contract')}}</button>
                            </form>
                        </div>
                        <div class="pt-4">
                            <a href="#" >Voir plus</a>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>



</div> --}}
@endsection
