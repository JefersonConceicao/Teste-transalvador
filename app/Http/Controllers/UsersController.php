<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $user = new User;

        $data = $user->all();
        return view('users.index', [
            'dataUsers' => $data
        ]);
    }
}
