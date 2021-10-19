<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class EmpresasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
                    'emp_nom_empresa' => 'required',
                    'log_num_cep' => 'required',
                    'log_nom_logradouro' => 'required',
                    'bai_nom_bairro' => 'required',
                    'end_num_numero' => 'required',
                    'emp_dti_atividade' => 'required',
                    'emp_dtf_atividade' => 'required'
                ];
        }
    }

    public function messages(){
        return [
            'required' => 'Campo obrigatório',
            'date' => 'Por favor insira uma data válida'
        ];
    }
}
