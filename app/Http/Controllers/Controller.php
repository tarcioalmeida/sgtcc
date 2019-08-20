<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;


use App\Http\Controllers\Controllers;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    function insert(Request $req){
//        $nome = $req->input('name');
//        $sobrenome = $req->input('sobrenome');
//        $email = $req->input('email');
//        $matricula = $req->input('matricula');
//        $telefone = $req->input('telefone');
//
//        $data = array('nome'=>$nome ." ".$sobrenome,'email'=>$email,'telefone'=>$telefone,'password'=>'111','matricula'=>$matricula,'curso_id'=>'1','atuacao_id'=>'1');
//
//        DB::table('users')->insert($data);
//
//        echo "Cadastrado com sucesso";
//    }

    function insereProjeto(Request $req){
        $tituloProjeto = $req->input('tituloProjeto');
        $descricaoProjeto = $req->input('descricaoProjeto');
        $area = $req->input('area');
        $semestre = $req->input('semestre_ano');
        $curso = $req->input('curso');
        $ano = date('Y');
        $tccId = 1;
        $professorOrientador = $req->input('professorOrientador');
        $grupoDePesquisa = $req->input('grupoDePesquisa');

        $data = array('titulo_projeto'=>$tituloProjeto,'descricao'=>$descricaoProjeto,'area'=>$area,'semestre'=>$semestre,'curso_id'=>$curso,'ano'=>$ano,'grupo_pesquisa'=>$grupoDePesquisa,'tcc_id'=>$tccId,'professor_orientador_id'=>$professorOrientador);

        DB::table('projeto')->insert($data);

        return redirect('/');
    }

    function insereAluno($projeto,$solicitacao){
        DB::table('projeto')
            ->where('id', $projeto)->update(['aluno_id' =>$solicitacao]);

        DB::table('solicitacao')
            ->join('users','solicitacao.aluno_id', '=','users.id')
            ->where('users.id',$solicitacao)
            ->update(['solicitacao.status' =>"aprovado"]);

        return redirect('/termo');
    }
}

