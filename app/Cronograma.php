<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    protected $fillable = ['nome_curso','materia_id','professor_tcc_id','tipo_entrega_id','descricao','data_entrega_inicio','data_entrega_fim'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'cronograma';
}
