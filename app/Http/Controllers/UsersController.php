<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public static function index(){
        $user = new User;
        $data = $user->all();
        
        return view('users.index', [
            'dataUsers' => $data
        ]);
    }

    public function create(){
        return view('users.create');
    }
}
