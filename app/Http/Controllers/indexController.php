<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index()
    {
        $index = [];
        $countProjeto = [];
        $professores = array();
        $projetoProf = [];
        $cursos = null;
        if(Auth::check()){
            if(Auth::user()->atuacao_id == 6){
                //aluno
                //projetos que não tem aluno associado e o que o aluno etá associado
                $cursos = Curso::all();
                $count = 0;
                if(count($cursos)>0){
                    foreach($cursos as $curso) {
                        $count = DB::table('projeto')
                            ->where('curso_id', $curso->id)
                            ->where('aluno_id', null)
                            ->orWhere('aluno_id', '=', Auth::user()->id)
                            ->count();
                        $countProjeto[$curso->id] = $count;
                        $count = 0;
                    }
                }
            }
            if(Auth::user()->atuacao_id ==2){
                //PO
                //listar projetos od professor

                $cursos = DB::table('curso')->where('id', Auth::user()->curso_id)->get();
                $count = 0;
                if(count($cursos)>0){
                    foreach($cursos as $curso) {
                        $count = 0;
                        $count = DB::table('projeto')
                            ->where('curso_id', '=', $curso->id)
                            ->where('professor_orientador_id', '=', Auth::user()->id)
                            ->count();
                        $countProjeto[$curso->id] = $count;
                    }
                }
            }
            if(Auth::user()->atuacao_id ==3){
                //PTCC
                //listar projetos do aluno
                $cursos = Curso::all();
                if(count($cursos)>0) {
                    foreach ($cursos as $curso) {
                        $count = 0;
                        $count = DB::table('projeto')
                            ->where('curso_id', '=', $curso->id)
                            ->where('professor_tcc_id', '=', Auth::user()->id)
                            ->count();
                        $countProjeto[$curso->id] = $count;
                    }
                }
            }

            if(Auth::user()->atuacao_id == 1 || Auth::user()->atuacao_id == 4|| Auth::user()->atuacao_id==5){

                $cursos = Curso::all();
                $count = 0;
                if(count($cursos)>0){
                    foreach($cursos as $curso) {
                            $count = DB::table('projeto')
                                ->where('curso_id', $curso->id)
                                ->count();
                            $countProjeto[$curso->id] = $count;
                        $count = 0;
                    }
                }
            }
        }else{
            $cursos = Curso::all();
            $count = 0;
            if(count($cursos)>0){
                foreach($cursos as $curso) {
                    $count = DB::table('projeto')->where('curso_id', $curso->id)->count();
                    $countProjeto[$curso->id] = $count;
                    $count = 0;
                }
            }
        }
        $index["cursos"] = $cursos;
        $index["countProjeto"] = $countProjeto;
        return view('index',['index'=>$index]);
    }
}