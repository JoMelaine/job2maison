@extends('recruteur.profil.app',['title'=>'Profil du recruteur','style'=>[]])

@section('profil')
    <div class="p-5" style="background: white" >
        <div class="col-12 ">

            <div class="row">
                <div class="col-7 ">
                    <h3 style="color: #20123a; font-weight: 700;">Identité</h3>
                    <p>Toutes les informations liées à l'identité du récruteur  </p>

                    <div class="profil_identite">
                        <form>
                            <div class="form-group">
                              <label class="profil_label">Nom complet</label>
                              <input class="form-control form-profil" value="{{$infos['employ_name']}}"   >
                            </div>
                            <div class="form-group">
                                <label class="profil_label">Email</label>
                                <input class="form-control form-profil" value="{{$infos['employ_email']}}"  >
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label class="profil_label" >Genre</label>
                                  <select class="form-control form-profil">
                                      <option value="{{$infos['employ_gender']}}">{{$infos['employ_gender']}}</option>
                                      @foreach ($tab_genre as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                      @endforeach
                                  </select>

                                </div>
                                <div class="form-group col-md-6">
                                  <label class="profil_label">Situation matrimoniale</label>
                                  <select class="form-control form-profil">
                                    <option value="{{$infos['employ_marital_status']}}">{{$infos['employ_marital_status']}}</option>
                                    @foreach ($marital_status as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach

                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="profil_label">Pays</label>
                                <select class="form-control form-profil">
                                    <option value="{{$infos['employ_country']}}">{{$infos['employ_country']}}</option>
                                    <option value="">Benin</option>
                                    <option value="">Côte d'ivoire</option>
                                    <option value="">Gabon</option>
                                    <option value="">Togo</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label class="profil_label" >Département</label>
                                  <select class="form-control form-profil">
                                      <option value="{{$infos['employ_town']}}">{{$infos['employ_town']}}</option>
                                      <option value="">Abidjan</option>
                                      <option value="">Yamoussoukro</option>
                                  </select>

                                </div>
                                <div class="form-group col-md-6">
                                  <label class="profil_label">Commune</label>
                                  <select class="form-control form-profil">
                                    <option value="{{$infos['employ_city']}}">{{$infos['employ_city']}}</option>
                                    <option value="">Yopognon</option>
                                    <option value="">Adjamé</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="profil_label">Adresse</label>
                                <input class="form-control form-profil" value="{{$infos['employ_address']}}" >
                            </div>
                            <div class="form-group">
                                <label class="profil_label">Mot de passe</label>
                                <input type="password" class="form-control form-profil" >
                            </div>
                            <button class="btn btn-primary btn-lg btn-block btn-infoId">Mise à jour</button>
                        </form>
                    </div>


                </div>
                <div class="col-5">
                    <h3 style="color: #20123a; font-weight: 700;">Photo</h3>
                    <p>Modifier le mot de passe</p>

                    {{-- <img src="storage/{{$infos['cand_photo']}}"  class="card-img"  alt="photo_profil"> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
