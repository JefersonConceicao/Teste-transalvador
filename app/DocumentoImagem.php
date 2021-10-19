<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DocumentoImagem extends Model
{
    protected $table = 'imd_imagem_documento';
    protected $primaryKey = 'imd_id_imd';
    protected $fillable = [
        'imd_nom_arquivo',
        'imd_arquivo',
        'imd_id_doc'
    ];
    public $timestamps = false;

    public function saveImage($idDocuemnto, $file){
        try{
        
            $nameFile = $file->getClientOriginalName();
            $path = $file->store('public');
        
            $this->fill([
                'imd_nom_arquivo' => $nameFile,
                'imd_arquivo' => Storage::url($path),
                'imd_id_doc' => $idDocuemnto
            ])->save();

            return [
                'error' => false,
                'msg' => 'Registro adicionado com sucesso'
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
