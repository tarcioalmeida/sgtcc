<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEntrega extends Model
{
    protected $fillable = ['nome_entrega'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'tipo_entrega';
}
