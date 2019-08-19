<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['relatorio', 'data_entrega', 'data_visualizacao', 'id_autor', 'id_projeto'];
    protected $guarded = ['id'];
    protected $table = 'relatorios';
}
