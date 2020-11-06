<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest{

    public function messages(){
        return [
            'email.required'  => "L'email est réquis",
            'pwd.required'      => 'Le mot de passe est réquis',
            'email.email'  => 'Le format est incorrect',

        ];
    }

    public function authorize (){
        return true;
    }

    public function rules(){
        return[
            'email'=>'required|email',
            'pwd'=>'required',
        ];
    }
}
