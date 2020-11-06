<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruteurRequest extends FormRequest{

    public function messages(){
        return [
            'phone1.required'  => "Le teléphone1 est réquis",
            'country.required'      => 'Le pays est réquis',
            'town.required'  => 'Le town est réquis ',
            'city.required'  => 'Le city est réquis',

        ];
    }

    public function authorize (){
        return true;
    }

    public function rules(){
        return[
            'phone1'        => 'required',
            //'email'         => 'required|email',
            'country'       => 'required',
            'town'          => 'required',
            'city'          => 'required',
        ];
    }
}
