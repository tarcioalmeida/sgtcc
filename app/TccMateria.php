<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TccMateria extends Model
{
    protected $fillable = ['nome_materia'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'tcc_materia';
}
