<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

use App\DocumentoImage;

class Documento extends Model
{
    protected $primaryKey = 'doc_id_doc';
    protected $table = 'doc_documento';
    protected $fillable = [
        'doc_num_documento',
        'doc_dat_cadastro',
        'doc_id_tdo',
        'doc_id_emp'
    ];

    public $timestamps = false;

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'doc_id_emp');
    }

    public function tipoDocumento(){
        return $this->belongsTo(DocumentosTipos::class, 'doc_id_tdo');
    }

    public function imagemDocumento(){
        return $this->hasOne(DocumentoImagem::class, 'imd_id_doc');
    }

    public function getDocumentos($request = []){
        $conditions = [];

        if(!empty($request['doc_num_documento']) && isset($request['doc_num_documento'])){
            $conditions[] = ['doc_num_documento', 'LIKE', "%".$request['doc_num_documento']."%"];
        }

        $data = $this 
            ->where($conditions)
            ->with('empresa','tipoDocumento', 'imagemDocumento')
            ->get();
        
        return $data;
    }

    public function saveDocumento($request = []){
        try{
            $response = ['error' => true, 'msg' => 'Não foi possível salvar o registro, tente novamente'];

            DB::beginTransaction();
            $prepareDocumento = $this->fill([
                'doc_num_documento' => $request['doc_num_documento'],
                'doc_dat_cadastro' => $request['doc_dat_cadastro'],
                'doc_id_tdo' => $request['doc_id_tdo'],
                'doc_id_emp' => $request['doc_id_emp']
            ]);

            if($prepareDocumento->save()){
                $documentoImagem = new DocumentoImagem;

                $responseDocumentoIMG = $documentoImagem->saveImage(
                    $prepareDocumento->doc_id_doc,
                    $request['imd_arquivo']
                );

                if(!$responseDocumentoIMG['error']){
                    DB::commit();

                    $response['error'] = false;
                    $response['msg'] = 'Registro salvo com sucesso';
                }
            }

            return $response;
        }catch(\Exception $error){
            DB::rollback();

            return [
                'error' => true,
                'msg' => 'Não foi possível salvar o registro, tente de novo'
            ];
        }
    }
}
