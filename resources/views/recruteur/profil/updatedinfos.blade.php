@extends('recruteur.app',['title'=>'Profil du recruteur','style'=>[]])

@section('recruteur')


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

                                <form action="{{route('Update_Employer_Infos')}}" class="p-2" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <input type="hidden" name="code" value="{{$infos['employ_code']}}">
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
                                              <option value="{{$infos['employ_gender']}}" selected>{{$infos['employ_gender']}}</option>
                                              <option value="Feminin" >Feminin</option>
                                              <option value="Masculin">Masculin</option>
                                            </select>
                                          </div>
                                        <div class="form-group col-md-6">
                                          <label class="label" >Nationnalité</label>
                                          <select id="inputState" name="country" class="form-control">
                                            <option value="{{$infos['employ_country']}}" selected>{{$infos['employ_country']}}</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Cote d'ivoire">Cote d'ivoire</option>
                                            <option value="Ghana">Ghana</option>
                                          </select>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label class="label" >Telephone 1</label>
                                          <input type="text" value="{{$infos['employ_phone1']}}"  class="form-control" name="phone1" placeholder="Telephone">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label class="label" >Telephone 2</label>
                                          <input type="text" value="{{$infos['employ_phone2']}}"  class="form-control" name="phone2" placeholder="WhatsApp">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label class="label" >Whatsapp</label>
                                          <input type="text" value="{{$infos['employ_wapp']}}" class="form-control" name="whatsapp" placeholder="WhatsApp">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label class="label" >Town</label>
                                          <input type="text" value="{{$infos['employ_town']}}" class="form-control" name="town" placeholder="Town">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label class="label" >City</label>
                                          <input type="text" value="{{$infos['employ_city']}}" class="form-control" name="city" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label class="label" >address</label>
                                          <input type="text" value="{{$infos['employ_address']}}" class="form-control" name="address" placeholder="address">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label class="label" >job</label>
                                          <input type="text" value="{{$infos['employ_job']}}" class="form-control" name="job">
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label class="label" >job_place</label>
                                          <input type="text" value="{{$infos['employ_job_place']}}" class="form-control" name="job_place" placeholder="job_place">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label" for="inputState">Statut matrimonial</label>
                                            <select id="inputState" name="marital_status" class="form-control">
                                              <option value="{{$infos['employ_marital_status']}}" selected>{{$infos['employ_marital_status']}}</option>
                                              <option value="Celibataire" >Célibataire</option>
                                              <option value="Marie sans enfant">Marié sans enfant</option>
                                              <option value="Marie avec enfant">Marié avec enfant</option>
                                            </select>
                                          </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-5">{{__('Connexion')}}</button>
                                  </form>


                            </div>
                        </div>
                    </div>

              </blockquote>
            </div>
          </div>
    </div>

@endsection
