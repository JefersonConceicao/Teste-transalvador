<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

//MODELS
use App\Logradouro;
use App\Endereco;
use App\Bairro;

class Empresa extends Model
{
    protected $primaryKey = 'emp_id_emp';
    public $timestamps = false;

    protected $table = 'emp_empresa';
    protected $fillable = [
        'emp_nom_empresa',
        'emp_dti_atividade',
        'emp_dtf_atividade'
    ];
   
    public function endereco(){
        return $this->hasOne(Endereco::class, 'end_id_emp');
    }

    public function getEmpresa($request = []){
        $conditions = [];
        
        if(isset($request) && !empty($request)){
            $conditions[] = ['emp_nom_empresa', 'LIKE', "%".$request['emp_nom_empresa']."%"];
        }

        $data = $this
            ->where($conditions)
            ->with('endereco.logradouro')
            ->get();

        return $data;
    }

    public function saveEmpresa($request = []){
        try{
            $response = ['error' => true, 'msg' => 'Não foi possível salvar o registro, tente de novo'];

            DB::beginTransaction();
            
            $prepareEmpresa = $this->fill([
                'emp_nom_empresa' => $request['emp_nom_empresa'],
                'emp_dti_atividade' => $request['emp_dti_atividade'],
                'emp_dtf_atividade' => $request['emp_dtf_atividade'],
            ]);
                
            if($prepareEmpresa->save()){
                $bairro = new Bairro;
                $responseBairro = $bairro->saveBairro(['bai_nom_bairro' => $request['bai_nom_bairro']]);

                if(!$responseBairro['error']){
                    $logradouro = new Logradouro;
                    $responseLogradouro = $logradouro->saveLogradouro([
                        'log_nom_logradouro' => $request['log_nom_logradouro'],
                        'log_num_cep' => $request['log_num_cep'],
                        'log_id_bai' => $responseBairro['lastInsertBairro']->bai_id_bai
                    ]);

                    if(!$responseLogradouro['error']){
                        $endereco = new Endereco; 
            
                        $responseLogradouro = $endereco->saveEndereco([
                            'end_num_numero' => $request['end_num_numero'],
                            'end_nom_complemento' => $request['end_nom_complemento'],
                            'end_num_lat' => $request['end_num_lat'],
                            'end_num_long' => $request['end_num_long'],
                            'end_id_log' => $responseLogradouro['lastInserLogradouro']->log_id_log,
                            'end_id_emp' => $this->emp_id_emp
                        ]);

                        if(!$responseLogradouro['error']){
                            DB::commit();

                            $response['error'] = false;
                            $response['msg'] = 'Registro salvo com sucesso!';
                        }
                    }
                }
            }
            
            return $response;
            
        }catch(\Exception $error){
            DB::rollback();
            return [
                'error' => true,
                'msg' => 'Não foi possível salvar o registro, tente novamente',
                'error_message' => $error->getMessage()
            ];
        }
    }
}
