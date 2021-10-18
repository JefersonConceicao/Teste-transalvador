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
        return view('users.index');
    }

    public function create(){
        return view('users.create');
    }
}
