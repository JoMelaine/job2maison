@extends('recruteur.app',['title'=>'Profil du recruteur'])

@section('recruteur')

    <div class="col-12">

        <div class="row">
            <div class="col-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action   @if($_SERVER['REQUEST_URI'] == '/employer/showinfo/identite') list_active @endif "   href="/employer/showinfo/identite" role="tab" >Identité</a>
                    <a class="list-group-item list-group-item-action  @if($_SERVER['REQUEST_URI'] == '/employer/showinfo/infopro') list_active @endif "   href="/employer/showinfo/infopro" role="tab" >Contacts</a>
                    <a class="list-group-item list-group-item-action   @if($_SERVER['REQUEST_URI'] == '/employer/showinfo/contact') list_active @endif"  href="/employer/showinfo/contact" role="tab" >Informations professionnelles</a>
                </div>
            </div>
            <div class="col-9">
                  <div class="tab-content">
                    @yield('profil')
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
