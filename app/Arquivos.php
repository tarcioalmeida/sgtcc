<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivos extends Model
{
    protected $fillable = ['file','descricao','tipo','tamanho','caminho','tcc_id','professor_orientador_id'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'arquivos';
}
