<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssociarAlunoController extends Controller
{
    public function index($id)
    {
        $projeto = DB::select(DB::raw("select * from projeto where projeto.id = $id"));
        $solicitacao = DB::select(DB::raw("select * from solicitacao where solicitacao.projeto_id  = $id"));

        $listAssociar = [];
        $aluno = null;
        $cursoNome = null;
        if(!empty($projeto)){
            foreach($solicitacao as $soli){
                $aluno[$soli->aluno_id] = DB::select(DB::raw("select u.nome,u.id from users as u where u.id = $soli->aluno_id"));
            }
//            $cursoNome = DB::select(DB::raw("select * from curso where curso.id = $projeto[0]->curso_id"));
            $listAssociar["projeto"] = $projeto;
            $listAssociar["solicitacoes"] = $solicitacao;
            $listAssociar["alunos"] = $aluno;
        }

        return view('associar-aluno',['listAssociar'=>$listAssociar]);
    }
}
