<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TiposDocumentosRequest;
use App\DocumentosTipos;

class DocumentosTiposController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documentosTipos = new DocumentosTipos;

        $data = $documentosTipos->getTiposDocumentos($request->all());
        return view('documentos_tipos.index', ['dataTiposDocumentos' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentos_tipos.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiposDocumentosRequest $request)
    {
        $documentosTipos = new DocumentosTipos;

        $data = $documentosTipos->saveTiposDocumentos($request->all());
        return response()->json($data);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documentosTipos = new DocumentosTipos;

        $data = $documentosTipos->deleteTiposDocumentos($id);
        return response()->json($data);
    }
}
