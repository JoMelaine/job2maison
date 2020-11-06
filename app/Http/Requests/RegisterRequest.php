<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest{

    public function messages(){
        return [
            'email.required'  => "L'email est réquis",
            'pwd.required'      => 'Le mot de passe est réquis',
            'email.email'  => 'Le format est incorrect',
            'nom.required' => 'Le nom et prénom(s) est réquis',
            'acc.required'  => 'Le type est requis',

        ];
    }

    public function authorize(){
        return true;
    }

    public function rules(){
        return[
            'email'=>'required|email',
            'nom'=>'required',
            'pwd'=>'required',
            'acc'=>'required',
        ];
    }
}
