<?php

namespace App;
use Eloquent;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'nome', 'email', 'password','matricula','telefone','curso_id','atuacao_id'

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // Relacionamento 1 para N

    public function curso()
    {
        return $this->belongsTo(Curso::class,'curso_id','id');
    }

    public function perfil()
    {
        return $this->belongsTo(Atuacao::class,'atuacao_id','id');
    }


}
