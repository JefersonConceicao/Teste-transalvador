<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password',
    ];

    public $timestamps = false;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function saveUser($request = []){
        try{
            $this->fill($request)->save();

            return [
                'error' => false,
                'msg' => 'Salvo com sucesso'
            ];  
        }catch(\Exception $error){
            return [
                'error' => true,
                'msg' => 'Error',
                'error_message' => $error->getMessage()
            ];
        }
    }   
}
