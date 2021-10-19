<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class DocumentosRequest extends FormRequest
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
                'doc_num_documento' => 'required',
                'doc_dat_cadastro' => 'date|required',
                'doc_id_tdo' => 'required',
                'doc_id_emp' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'required' => 'Campo obrigatório',
            'date' => 'Preencha com uma data válida'
        ];
    }
}
