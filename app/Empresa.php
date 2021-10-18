<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'emp_empresa';
    protected $fillable = [
        'emp_nom_empresa',
        'emp_dti_atividade',
        'emp_dtf_atividade'
    ];
    protected $primaryKey = 'emp_id_emp';
    public $timestamps = false;

    public function saveEmpresa($request = []){
        try{
            $this->fill($request)->save();
            
            return [
                'error' => false,
                'msg' => 'Dados cadastrados com sucesso!'
            ];
        }catch(\Exception $error){
            return [
                'error' => true,
                'msg' => 'Não foi possível salvar o registro, tente novamente',
                'error_message' => $error->getMessage()
            ];
        }
    }
}
