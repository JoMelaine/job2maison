<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatRequest extends FormRequest{

    public function messages(){
        return [
            'gender.required'  => "Le genre est réquis",
            'birthday.email'  => "La date d'anniversaire est incorrect",
            'phone1.required'  => 'Le numéro de teléphone 1 est requis',
            'town.required'  => 'Town est requis',
            'city.required'  => 'City est requis',
            'job.required'  => 'Le job est requis',
            'school_level.required'  => "Le niveau d'étude  est requis",
            'salary.required'  => "L'interval salarial est requis",
            'job_time.required'  => "Les horaires du job est requis",
            'job_place.required'  => "L'adresse du job est requis",

        ];
    }

    public function authorize (){
        return true;
    }

    public function rules(){
        return[
            'gender'        => 'required',
            'name'          => 'required',
            'birthday'      => 'required|date_format:"d/m/Y"',
            'phone1'        => 'required',
            //'email'         => 'required|email',
            'country'       => 'required',
            'town'          => 'required',
            'city'          => 'required',
            'job'           => 'required',
            //'tasks'         => 'required',
            'school_level'  => 'required',
            'salary'        => 'required',
            'job_time'      => 'required',
            'job_place'     => 'required'
        ];
    }
}
