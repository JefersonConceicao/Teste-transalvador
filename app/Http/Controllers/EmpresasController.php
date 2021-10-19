<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//REQUESTS
use App\Http\Request\EmpresasRequest;
//MODEL
use App\Empresa;

class EmpresasController extends Controller
{
    public function index(Request $request){
        $empresa = new Empresa;

        $data = $empresa->getEmpresa($request->all());
        return view('empresas.index', ['dataEmpresas' => $data]);
    }

    public function create(){
        return view('empresas.create');
    }

    public function store(Request $request){
        $empresa = new Empresa;

        $data = $empresa->saveEmpresa($request->all());
        return response()->json($data);
    }
}
