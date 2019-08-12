<?php

namespace App;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Curso extends Eloquent
{
    protected $fillable = ['nome_curso'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];
    protected $table = 'curso';



    public function usuario()
    {
        return $this->hasMany(User::class ,'curso_id','id');
    }



}
