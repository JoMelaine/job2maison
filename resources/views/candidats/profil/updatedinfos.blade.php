@extends('candidats.app',['title'=>'Livraison','style'=>[]])

@section('candidat')
<div class="container mt-3">
    <div class="card">
        <div class="card-header mt-3" style="color:#e30d6a; font-weight: 600; font-size: 15px; background: white" >
            Bienvenue sur votre page inscription dans la platerforme <span style="color: #20123a">Job2maison</span>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <div class="col-12 mt-3">
                    <div class="row">

                        <div class="col-9" style="border-left: 2px solid black">
                             <h4 style="color:#e30d6a; margin-top:30px; margin-bottom:30px;"><small style="color: #20123a">1 etapes sur 3 :</small> Informations Personnelles</h4>

                            <form action="{{route('update_infoCandidat')}}" class="p-2" enctype="multipart/form-data" method="POST">
                                @csrf

                                <input type="hidden" name="code" value="{{$infos['cand_code']}}">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="label" for="inputState">Photo</label>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="label" for="inputState">Genre</label>
                                        <select id="inputState" name="gender" class="form-control">
                                          <option value="{{$infos['cand_gender']}}" selected>{{$infos['cand_gender']}}</option>
                                          <option value="Feminin" >Feminin</option>
                                          <option value="Masculin">Masculin</option>
                                        </select>
                                      </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >Nationnalité</label>
                                      <select id="inputState" name="country" class="form-control">
                                        <option value="{{$infos['cand_country']}}" selected>{{$infos['cand_country']}}</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Cote d'ivoire">Cote d'ivoire</option>
                                        <option value="Ghana">Ghana</option>
                                      </select>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="label" >Date de naissance</label>
                                        <input type="date" name="birthday" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="label" >Lieu de naissance</label>
                                        <input type="text" value="{{$infos['cand_birthplace']}}" name="birthplace" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >Telephone 1</label>
                                      <input type="text"  class="form-control" name="phone1" value="{{$infos['cand_phone1']}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >Telephone 2</label>
                                      <input type="text" class="form-control" name="phone2" value="{{$infos['cand_phone2']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="label" >Whatsapp</label>
                                        <input type="text" class="form-control" name="whatsapp" value="{{$infos['cand_wapp']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >Town</label>
                                      <input type="text" class="form-control" name="town" value="{{$infos['cand_town']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >City</label>
                                      <input type="text" class="form-control" name="city" value="{{$infos['cand_city']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >address</label>
                                      <input type="text" class="form-control" name="address" value="{{$infos['cand_address']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >job</label>
                                      <select name="job" id="" class="form-control">
                                            <option value="{{$infos['cand_job']}}" selected>{{$infos['cand_job']}}</option>
                                            @foreach ($job as $item)
                                                @if($infos['cand_job'] != $item['job_name'] )
                                                    <option value="{{$item['job_name']}}">{{$item['job_name']}}</option>
                                                @endif
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >Tasks</label>
                                      <select name="tasks" id="" class="form-control">
                                        <option value="{{$infos['cand_job_tasks']}}" selected>{{$infos['cand_job_tasks']}}</option>
                                        @foreach ($jobtask as $item)
                                            @if($infos['cand_job_tasks'] != $item['task_name'])
                                                <option value="{{$item['task_name']}}">{{$item['task_name']}}</option>
                                            @endif
                                        @endforeach
                                  </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >job_time</label>
                                      <input type="text" class="form-control" name="job_time" value="{{$infos['cand_job_time']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >job_place</label>
                                      <input type="text" class="form-control" name="job_place" value="{{$infos['cand_job_place']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >school_level</label>
                                      <input type="text" class="form-control" name="school_level" value="{{$infos['cand_school_level']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >diploma</label>
                                      <input type="text" class="form-control" name="diploma" value="{{$infos['cand_diploma']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >salary</label>
                                      <input type="text" class="form-control" name="salary" value="{{$infos['cand_salary']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >cand_contract_type</label>
                                      <input type="text" class="form-control" name="cand_contract_type" value="{{$infos['cand_contract_type']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >availability</label>
                                      <input type="text" class="form-control" name="availability" value="{{$infos['cand_available']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="label" >tutor_name</label>
                                      <input type="text" class="form-control" name="tutor_name" value="{{$infos['cand_tutor_name']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="label" >tutor_phone</label>
                                      <input type="text" class="form-control" name="tutor_phone" value="{{$infos['cand_tutor_phone1']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label class="label" >tutor_address</label>
                                      <input type="text" class="form-control" name="tutor_address" value="{{$infos['cand_tutor_address']}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label class="label" >Description</label>
                                        <textarea name="description" id="" class="form-control"  rows="3">{{$infos['cand_descrip']}}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-lg mt-5">{{__('Valider')}}</button>
                              </form>


                        </div>
                    </div>
                </div>

          </blockquote>
        </div>
      </div>
</div>
@endsection
