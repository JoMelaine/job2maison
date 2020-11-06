@extends('recruteur.app',['title'=>'Profil du recruteur','style'=>[]])

@section('recruteur')
<div class="container">
    <div >
        <form action="{{route('search')}}" enctype="multipart/form-data" method="GET" class="d-flex my-3">

            <div class="form-group mb-0 col-6">
                <input type="text" name="searchs" placeholder="Rechercher" class="form-control">
            </div>
            <button class="btn btn-primary">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                      </svg>
            </button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle" scope="col">Nom</th>
                    <th class="align-middle" scope="col">Job</th>
                    <th class="align-middle" scope="col">Adresse</th>
                    <th class="align-middle" scope="col">Salaire</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tab_search as $item)
                    <tr>
                        <td class="align-middle">{{$item['cand_name']}}</td>
                        <td class="align-middle">{{$item['cand_job_tasks']}}</td>
                        <td class="align-middle">{{$item['cand_city']}} {{$item['cand_town']}} {{$item['cand_country']}}</td>
                        <td class="align-middle">{{$item['cand_salary']}}</td>
                        <td class="align-middle">
                            <a href="/employer/read/candidate/seemore/{{$item['cand_code']}}">Voir plus</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
