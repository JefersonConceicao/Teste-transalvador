<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function create(){
        return view('home.create');
    }

    public function store(Request $request){
        dd($request->all());
        $empresa = new Empresa;

        $data = $empresa->saveEmpresa($request->all());
        dd($data);
    }
}
