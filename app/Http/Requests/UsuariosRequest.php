<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UsuariosRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        $currentRouteName = explode('.', Route::currentRouteName());
        switch(end($currentRouteName)){
            case 'store': 
                return [
                    'nome' => 'required',
                    'email' => [
                        'required',
                        'unique:usuarios,email',
                    ],
                    'password' => [
                        'required',
                        'min:8',
                    ],
                    'password_confirmation' => [
                        'required',
                        'same:password'
                    ]
                ];
        }
    }

    public function messages(){
        return [ 
            'required' => 'Campo obrigatório',
            'email' => 'O campo deve ser um e-mail válido',
            'min' => 'A quantidade de caracteres mínima é :min',
            'same' => 'Senhas não conferem',
            'unique' => 'Este e-mail já existe em nossa base de dados'   
        ];
    }
}
