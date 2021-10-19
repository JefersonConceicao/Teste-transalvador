<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class TiposDocumentosRequest extends FormRequest
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
        $currentRoute = explode('.', Route::currentRouteName());

        switch(end($currentRoute)){
            case 'store': 
            return [
                'tdo_nome_tipo_documento' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'required' => 'Campo obrigatório',
        ];
    }
}
