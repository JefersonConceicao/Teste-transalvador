<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentosTipos extends Model
{
    protected $primaryKey = 'tdo_id_tdo';
    protected $table = 'tdo_tipo_documento';
    protected $fillable = [
        'tdo_nome_tipo_documento'
    ];  

    public $timestamps = false;

    public function getTiposDocumentos($request = []){
        $conditions = [];

        if(isset($request['tdo_nome_tipo_documento']) && !empty($request['tdo_nome_tipo_documento'])){
            $conditions[] = ['tdo_nome_tipo_documento', 'LIKE', "%".$request['tdo_nome_tipo_documento']."%"];
        }

        return $this->where($conditions)->get();
    }

    public function saveTiposDocumentos($request = []){
        try{
            $this->fill($request)->save();

            return [
                'error' => false,
                'msg' => 'Salvo com sucesso!'
            ];
        }catch(\Exception $error){
            return [
                'error' => true,
                'msg' => 'Não foi possível salvar o registro, tente de novo'
            ];
        }
    }

    public function deleteTiposDocumentos($id){
        if($this->find($id)->delete()){ 
            return [
                'error' => false,
                'msg' => 'Registro excluído com sucesso!'
            ];
        }else{
            return [
                'error' => true,
                'msg' => 'Não foi possível excluír o registro, tente de novo'
            ];
        }
    }

}
