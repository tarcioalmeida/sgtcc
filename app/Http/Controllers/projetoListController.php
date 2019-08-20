<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class projetoListController extends Controller
{
    public function index($id)
    {
        $profProject = [];
        $professores = null;
        $projetoProf = null;

        if(Auth::check()){
            if(Auth::user()->atuacao_id == 6){
                //aluno
                //projetos que não tem aluno associado e o que o aluno etá associado

                $professores = DB::select(DB::raw("select * from users 
                                            join projeto on projeto.professor_orientador_id = users.id 
                                            where users.atuacao_id = 2 and users.curso_id = $id group by users.id"));
                if(count($professores)>0){
                    foreach($professores as $professor){
                        if(isset($professor)){
                            $project = DB::table('projeto')
                                ->where('professor_orientador_id', "=",$professor->professor_orientador_id)
                                ->where('aluno_id', null)
                                ->orWhere('aluno_id', '=', Auth::user()->id)
                                ->get();
                            $idOrientador = $professor->id;
                            if(!empty($project)){
                                $projetoProf[$idOrientador] = $project;
                            }
                        }

                    }
                }
            }
            if(Auth::user()->atuacao_id ==2){
                //PO
                //listar projetos od professor
                $professores = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->Where('curso_id', '=', $id)
                    ->get();

                if(count($professores)>0){
                    foreach($professores as $professor){
                        if(isset($professor)){
                            $project = DB::table('projeto')
                                ->where('professor_orientador_id', "=",Auth::user()->id)
                                ->get();

                            $idOrientador = $professor->id;
                            if(!empty($project)){
                                $projetoProf[$idOrientador] = $project;
                            }
                        }

                    }
                }
            }
            if(Auth::user()->atuacao_id ==3){
                //PTCC
                //listar projetos do aluno
                $professores = DB::select(DB::raw("select * from users 
                                            inner join projeto on projeto.professor_orientador_id = users.id 
                                            where users.atuacao_id = 2 and users.curso_id = $id group by users.id"));

                if(count($professores)>0){
                    foreach($professores as $professor){
                        if(isset($professor)){
                            $project = DB::table('projeto')
                                ->where('professor_tcc_id', "=",Auth::user()->id)
                                ->get();
                            $idOrientador = $professor->id;
                            if(!empty($project)){
                                $projetoProf[$idOrientador] = $project;
                            }
                        }

                    }
                }
            }
            if(Auth::user()->atuacao_id == 1 || Auth::user()->atuacao_id == 4|| Auth::user()->atuacao_id==5){
                $professores = DB::select(DB::raw("select * from users 
                                            inner join projeto on projeto.professor_orientador_id = users.id 
                                            where users.atuacao_id = 2 and users.curso_id = $id group by users.id"));
                if(count($professores)>0){
                    foreach($professores as $professor){
                        if(isset($professor)){
                            $project = DB::table('projeto')->where('professor_orientador_id', "=",$professor->id)->get();
                            $idOrientador = $professor->id;
                            if(!empty($project)){
                                $projetoProf[$idOrientador] = $project;
                            }
                        }

                    }
                }
            }
        }else{
            $professores = DB::select(DB::raw("select * from users 
                                            inner join projeto on projeto.professor_orientador_id = users.id 
                                            where users.atuacao_id = 2 and users.curso_id = $id group by users.id"));
            if(count($professores)>0){
                foreach($professores as $professor){
                    if(isset($professor)){
                        $project = DB::table('projeto')->where('professor_orientador_id', "=",$professor->id)->get();
                        $idOrientador = $professor->id;
                        if(!empty($project)){
                            $projetoProf[$idOrientador] = $project;
                        }
                    }

                }
            }
        }

        $profProject["professores"]= $professores;
        $profProject["projeto"]= $projetoProf;
        return view('projetos',['profProject'=>$profProject]);
    }
}
