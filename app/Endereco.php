<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'end_endereco';
    protected $fillable = [
        'end_num_numero',
        'end_nom_complemento',
        'end_num_lat',
        'end_num_long',
        'end_id_log',
        'end_id_emp'
    ];

    public $timestamps = false;

    public function logradouro(){
        return $this->belongsTo(logradouro::class, 'end_id_log');
    }

    public function saveEndereco($request = []){
        try{
            $this->fill($request)->save();  

            return [
                'error' => false,
                'msg' => 'Registro adicionado com sucesso',
                'lastInsertEndereco' => $this
            ];
        }catch(\Exception $error){
            return [
                'error' => true,
                'msg' => 'Não foi posssível salvar o registro, tente de novo'
            ];
        }
    }
}
