<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//REQUEST
use App\Http\Requests\UsuariosRequest;

//MODELS
use App\User;

class UsersController extends Controller
{
    public static function index(){
        $user = new User;
        $data = $user->all();
        
        return view('users.index', ['dataUsers' => $data ]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(UsuariosRequest $request){
        $user = new User;

        $data = $user->saveUser($request->all());
        return response()->json($data);
    }
}
