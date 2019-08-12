<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $fillable = ['status','aluno_id','projeto_id'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'solicitacao';
}
