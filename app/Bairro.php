<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table = 'bai_bairro';
    protected $primaryKey = 'bai_id_bai';
    protected $fillable = [
        'bai_nom_bairro'
    ];
    public $timestamps = false;

    public function saveBairro($request = []){
        try{
            $this->fill($request)->save();
            
            return [
                'error' => false,
                'msg' => 'Registro adicionado com sucesso',
                'lastInsertBairro' => $this
            ];
        }catch(\Exception $error){
            return [
                'error' => true,
                'msg' => 'Não foi possível salvar o regsitro, tente de novo'
            ];
        }
    }
}
