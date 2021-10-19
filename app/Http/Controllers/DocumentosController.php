<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DocumentosRequest;
use App\DocumentosTipos;
use App\Empresa;
use App\Documento;

class DocumentosController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $documentos = new Documento;

        $data = $documentos->getDocumentos($request->all());   
        return view('documentos.index', [
            'dataDocumentos' => $data
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $tiposDocumentos = new DocumentosTipos; 
        $empresa = new Empresa;

        $optionsTiposDocumentos = $tiposDocumentos
            ->pluck('tdo_nome_tipo_documento', 'tdo_id_tdo')
            ->toArray();

        $optionsTiposEmpresas = $empresa
        ->pluck('emp_nom_empresa', 'emp_id_emp')
        ->toArray();

        return view('documentos.create', [
            'optionsTiposDocumentos' => $optionsTiposDocumentos,
            'optionsTiposEmpresas' => $optionsTiposEmpresas,
        ]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentosRequest $request)
    {
        $documento = new Documento; 

        $data = $documento->saveDocumento($request->all());
        return response()->json($data);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
