@extends('recruteur.app',['title'=>'Profil du recruteur','style'=>[]])

@section('recruteur')
<div class="container">
    <div class="card " >
        <div class="row no-gutters">
          <div class="col-md-4">
              @if($cand['cand_photo'])
                <img src="{{url('storage')."/".$cand['cand_photo']}}" class="card-img" alt="photo_candidat">
              @else
                <svg  viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                </svg>
              @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title">{{$cand['cand_name']}}</h4>
                <p>{{$cand['cand_address']}} {{$cand['cand_city']}} {{$cand['cand_town']}} {{$cand['cand_country']}}</p>
                <p class="card-text">Sexe: <small class="text-muted">{{$cand['cand_gender']}}</small></p>
                @if($cand['cand_birthday'])
                  <p class="card-text">Date de naissance: <small class="text-muted">{{$cand['cand_birthday']}}</small></p>
                @else
                  <p>Date de naissance: <small class="text-muted">Indéfini</small></p>
                @endif
                @if($cand['cand_birthplace'])
                  <p class="card-text">Lieu de naissance: <small class="text-muted">{{$cand['cand_birthplace']}}</small></p>
                @endif
                @if($cand['cand_descrip'])
                  <p class="card-text">Description: <small class="text-muted">{{$cand['cand_descrip']}}</small></p>
                @endif
                @if($cand['cand_job'])
                  <p class="card-text">Job: <small class="text-muted">{{$cand['cand_job']}}</small></p>
                @endif
                @if($cand['cand_job_tasks'])
                  <p class="card-text">Job_tasks: <small class="text-muted">{{$cand['cand_job_tasks']}}</small></p>
                @endif
                @if($cand['cand_job_time'])
                  <p class="card-text">Job_time: <small class="text-muted">{{$cand['cand_job_time']}}</small></p>
                @endif
                @if($cand['cand_diploma'])
                  <p class="card-text">Diplome: <small class="text-muted">{{$cand['cand_diploma']}}</small></p>
                @endif
                @if($cand['cand_job_time'])
                  <p class="card-text">Salaire: <small class="text-muted">{{$cand['cand_salary']}}</small></p>
                @endif @if($cand['cand_available'])
                  <p class="card-text">Handicap: <small class="text-muted">{{$cand['cand_available']}}</small></p>
                @endif
                <form action="{{route('active_contrat')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="code" value="{{$cand['cand_code']}}">
                    <button class="btn btn-primary mt-2">Ajouter à ma liste provisoire</button>
                </form>
                <form action="{{route('read_candidate')}}" enctype="multipart/form-data" method="GET">
                    @csrf
                    <button class="btn btn-primary mt-2">Fermer</button>
                </form>
            </div>
          </div>

          {{-- <div class="col-md-8">
            <div class="card-body">

                <form action="{{route('active_contrat')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="code" value="{{$cand['cand_code']}}">
                    <button class="btn btn-primary mt-2">Ajouter à ma liste provisoire</button>
                </form>
                <form action="{{route('read_candidate')}}" enctype="multipart/form-data" method="GET">
                    @csrf
                    <button class="btn btn-primary mt-2">Fermer</button>
                </form>
            </div>
          </div> --}}
        </div>
    </div>
</div>
@endsection
