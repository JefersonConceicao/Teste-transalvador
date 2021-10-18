<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password',
    ];

    public $timestamps = false;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
   
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
            ];
        }
    }   
}
