<?php

namespace App\Http\Controllers;

use App\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::all();
        return view('projetos.index',['projetosall'=>$projetos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('projetos.create');
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
            'titulo_projeto' =>'required',
            'area' =>'required',
            'descricao' =>'required',
            'semestre' => 'required',
            'ano'  => 'required',
            'curso_id' => 'required',
            'tcc_id' => 'required',
            'aluno_id' => 'required',
            'professor_tcc_id'=> 'required',
            'professor_orientador_id'=> 'required',
        ]);
        $projeto = new Projeto;
        $projeto->titulo_projeto            = $request->titulo_projeto;
        $projeto->Area                      = $request->area;
        $projeto->descricao                 = $request->descricao;
        $projeto->semestre                  = $request->semestre;
        $projeto->grupo_pesquisa            = $request->grupo_pesquisa;
        $projeto->ano                       = $request->ano;
        $projeto->curso_id                  = $request->curso_id;
        $projeto->tcc_id                    = $request->tcc_id;
        $projeto->aluno_id                  = $request->aluno_id;
        $projeto->professor_tcc_id          = $request->professor_tcc_id;
        $projeto->professor_orientador_id   = $request->professor_orientador_id;
        $projeto->save();
        return redirect()->route('projetos')->with('message', 'projeto created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projetos = Projeto::find($id);
        if(!$projetos){
            abort(404);
        }
        return view('projetos.details')->with('detailpage',$projetos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('projetos.edit',compact('projeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titulo_projeto' =>'required',
            'area' =>'required',
            'descricao' =>'required',
            'semestre' => 'required',
            'ano'  => 'required',
            'curso_id' => 'required',
            'tcc_id' => 'required',
            'aluno_id' => 'required',
            'professor_tcc_id'=> 'required',
            'professor_orientador_id'=> 'required',
        ]);
        $projeto = Projeto::find($id);
        $projeto->titulo_projeto        = $request->titulo_projeto;
        $projeto->Area = $request->area;
        $projeto->descricao   = $request->descricao;
        $projeto->semestre = $request->semestre;
        $projeto->grupo_pesquisa = $request->grupo_pesquisa;
        $projeto->ano = $request->ano;
        $projeto->curso_id = $request->curso_id;
        $projeto->tcc_id       = $request->tcc_id;
        $projeto->aluno_id = $request->aluno_id;
        $projeto->professor_tcc_id = $request->professor_tcc_id;
        $projeto->professor_orientador_id       = $request->professor_orientador_id;
        $projeto->save();
        return redirect()->route('projetos')->with('message', 'projeto editado successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projeto = Projeto::findOrFail($id);
        $projeto->delete();
        return redirect()->route('projetos.index')->with('alert-success','Projeto hasbeen deleted!');
    }
}
