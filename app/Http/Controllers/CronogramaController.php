<?php

namespace App\Http\Controllers;

use App\Cronograma;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cronogramas = Cronograma::all();
        return view('cronogramas.index',['cronogramasall' => $cronogramas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cronogramas.create');
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
            'nome_curso' => 'required',
            'materia_id' => 'required',
            'professor_tcc_id' => 'required',
            'tipo_entrega_id' => 'required',
            'descricao' => 'required',
            'data_entrega' => 'required',
        ]);
        $cronograma = new Cronograma;
        $cronograma->nome_curso = $request->nome_curso;
        $cronograma->materia_id = $request->materia_id;
        $cronograma->professor_tcc_id = $request->professor_tcc_id;
        $cronograma->tipo_entrega_id = $request->tipo_entrega_id;
        $cronograma->descricao = $request->descricao;
        $cronograma->data_entrega = $request->data_entrega;
        $cronograma->save();
        return redirect()->route('cronogramas')->with('message','Cronograma criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cronograma = Cronograma::find($id);
        if(!$cronograma){
            abort(404);
        }
        return view('cronogramas.details')->with('detailpage',$cronograma);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cronograma = Cronograma::findOrFail($id);
        return view('cronogramas.edit',compact('cronograma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome_curso' => 'required',
            'materia_id' => 'required',
            'professor_tcc_id' => 'required',
            'tipo_entrega_id' => 'required',
            'descricao' => 'required',
            'data_entrega' => 'required',
        ]);

        $cronograma = Cronograma::find($id);
        $cronograma->nome_curso = $request->nome_curso;
        $cronograma->materia_id = $request->materia_id;
        $cronograma->professor_tcc_id = $request->professor_tcc_id;
        $cronograma->tipo_entrega_id = $request->tipo_entrega_id;
        $cronograma->descricao = $request->descricao;
        $cronograma->data_entrega = $request->data_entrega;
        $cronograma->save();
        return redirect()->route('cronogramas')->with('message','Cronograma criado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cronograma = Cronograma::findOrFail($id);
        $cronograma->delete();
        return redirect()->route('cronogramas.index')->with('alert-sucess','Cronograma foi deletado');
    }
}
