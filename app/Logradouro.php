<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model
{
    protected $primaryKey = 'log_id_log';
    protected $table = 'log_logradouro';
    protected $fillable = [
        'log_nom_logradouro',
        'log_num_cep',
        'log_id_bai'
    ];
    
    public $timestamps = false;

    public function bairro(){
        return $this->belongsTo(Bairro::class, 'log_id_bai');
    }

    public function saveLogradouro($request = []){
        try{
            $this->fill($request)->save();

            return [
                'error' => false,
                'msg' => 'Registro adicionado com sucesso!',
                'lastInserLogradouro' => $this
            ];
        }catch(\Exception $error){
            return [
                'error' => true,
                'msg' => 'Não foi possível salvar o registro tente novamente',
                'error_message' => $error->getMessage()
            ];
        }
    }
}
