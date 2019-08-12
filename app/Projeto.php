<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['titulo_projeto','area','descricao','semestre','grupo_pesquisa','ano','curso_id','tcc_id','aluno_id','professor_tcc_id','professor_orientador_id'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'projeto';
}
