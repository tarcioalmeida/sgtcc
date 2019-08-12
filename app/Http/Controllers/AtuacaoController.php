<?php

namespace App\Http\Controllers;

use App\Atuacao;
use Illuminate\Http\Request;

class AtuacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atuacoes = Atuacao::all();
        return view('atuacoes.index',['atuacaosall'=>$atuacoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atuacoes.create');
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
            'atuacao_nome' =>'required',
        ]);
        $atuacoes = new Atuacao;
        $atuacoes->atuacao_nome   = $request->atuacao_nome;
        $atuacoes->save();
        return redirect()->route('atuacoes')->with('message', 'Atuacao created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atuacao  $atuacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atuacoes = Atuacao::find($id);
        if(!$atuacoes){
            abort(404);
        }
        return view('atuacoes.details')->with('detailpage',$atuacoes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atuacao  $atuacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atuacoes = Atuacao::findOrFail($id);
        return view('atuacoes.edit',compact('atuacoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atuacao  $atuacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'atuacao_nome' =>'required',
        ]);

        $atuacoes = Atuacao::find($id);
        $atuacoes->atuacao_nome   = $request->atuacao_nome;
        $atuacoes->save();
        return redirect()->route('atuacoes')->with('message', 'Atuacao editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atuacao  $atuacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atuacoes = Atuacao::findOrFail($id);
        $atuacoes->delete();
        return redirect()->route('atuacoes.index')->with('alert-success','Atuacao hasbeen deleted!');
    }
}
