<?php

namespace App;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Atuacao extends Eloquent
{
    protected $fillable = ['atuacao_nome'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'atuacao';

    public function usuario()
    {
        return $this->hasMany(User::class ,'atuacao_id','id');
    }
}
