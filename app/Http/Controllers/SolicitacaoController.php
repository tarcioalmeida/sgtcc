<?php

namespace App\Http\Controllers;

use App\Solicitacao;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitacao = Solicitacao::all();
        return view('solicitacao.index',['solicitacaoall'=>$solicitacao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'status' =>'required',
            'aluno_id' =>'required',
            'projeto_id' => 'required',
            'curso_id' =>'required',
        ]);
        $solicitacao = new Solicitacao;
        $solicitacao->status      = $request->status;
        $solicitacao->aluno_id    = $request->aluno_id;
        $solicitacao->projeto_id  = $request->projeto_id;
        $saved = $solicitacao->save();
        if($saved){
            return redirect()->route('associar_aluno_projeto',$request->curso_id)->with('message', 'ok');
        }else{
            return redirect()->route('associar_aluno_projeto',$request->curso_id)->with('message', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitacao = Solicitacao::find($id);
        if(!$solicitacao){
            abort(404);
        }
        return view('solicitacao.details')->with('detailpage',$solicitacao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        return view('solicitacao.edit',compact('solicitacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status' =>'required',
            'aluno_id' =>'required',
            'projeto_id' => 'required',
        ]);
        $solicitacao = Solicitacao::find($id);
        $solicitacao->status      = $request->status;
        $solicitacao->aluno_id    = $request->aluno_id;
        $solicitacao->projeto_id  = $request->projeto_id;
        $solicitacao->save();
        return redirect()->route('solicitacao')->with('message', 'Solicitação created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->delete();
        return redirect()->route('solicitacao.index')->with('alert-success','Solicitacao hasbeen deleted!');
    }
}
