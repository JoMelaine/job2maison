@extends('candidats.app',['title'=>'Livraison','style'=>[]])

@section('candidat')

    <div>
        <infoscandidat-component :infos="{{json_encode($infos ?? '')}}"
            :m_photo="{{json_encode(session('m_photo') ?? '')}}" :tab_genre="{{json_encode($tab_genre ?? '')}}"></infoscandidat-component>
    </div>

    {{-- <div class="container p-5 mt-3" style="background: white">

        <div class="row">

            <div class="col-sm-3">
                @if(!$infos['cand_photo'])
                    <div class="card" >
                        <img src="/images/twiter.png?1abe3452ed74055b0ad9eddc6db5c18e" class="card-img-top" >
                    </div>
                @else
                    <div class="card">
                        <img src="{{url('storage')."/".$infos['cand_photo']}}" >
                    </div>
                @endif

              <div class="card mt-3" style="width: 16rem;">
                <div class="card-header">
                    Informations personnelles
                  </div>
                <div class="card-body">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Genre </div>
                        <div class="p-2 flex-fill bd-highlight">{{$infos['cand_gender']}}</div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Date de naissance </div>
                        <div class="p-2 flex-fill bd-highlight">{{$infos['cand_birthday']}}</div>
                    </div>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-fill bd-highlight">Lieu de naissance </div>
                        <div class="p-2 flex-fill bd-highlight">{{$infos['cand_birthplace']}}</div>
                    </div>
                </div>
              </div>




            </div>

            <div class="col-sm-9">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$infos['cand_name']}}</h5>

                  <div class="d-flex justify-content-between">
                    <div>
                        <p class="title-p-blue mt-2">{{$infos['cand_city']}} {{$infos['cand_town']}} {{$infos['cand_country']}}</p>
                    </div>

                    <div >
                    <form action="{{route('modification_btn')}}" method="GET" enctype="multipart/form-data">
                        <button class="btn btn-success" type="submit">{{__('Modifier votre profil')}}</button>
                    </form>

                    </div>
                </div>

                </div>
              </div>
              <div class="row mt-3">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            Qualification professionnelle
                        </div>
                        <div class="card-body">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Job</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_job']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Tasks</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_job_tasks']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Horaire</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_job_time']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Place</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_job_place']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Diplome</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_diploma']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">School</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_school_level']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Salaire</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_salary']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Annees d'experience</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_experience']}}</div>
                            </div>



                        </div>
                      </div>
                </div>
                <div class="col-4">
                    <div class="card mt-3" style="width: 16rem;">
                        <div class="card-header">
                            Contact
                          </div>
                        <div class="card-body">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Contact 1 </div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_phone1']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">Contact 2 </div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_phone2']}}</div>
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">WhatsApp</div>
                                <div class="p-2 flex-fill bd-highlight">{{$infos['cand_wapp']}}</div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>


        </div>

    </div> --}}

@endsection
