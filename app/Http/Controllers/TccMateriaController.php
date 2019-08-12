<?php

namespace App\Http\Controllers;

use App\TccMateria;
use Illuminate\Http\Request;

class TccMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tccmaterias = TccMateria::all();
        return view('tccmaterias.index',['tccmateriasall'=>$tccmaterias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tccmaterias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome_materia' =>'required',
        ]);

        $tccmateria = new TccMateria;
        $tccmateria->nome_materia = $request->nome_materia;
        $tccmateria -> save();

        return redirect()->route('tccmaterias')->with('message', 'TCC Materia created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TccMateria  $tccMateria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tccmateria= TccMateria::find($id);
        if(!$tccmateria){
            abort(404);
        }
        return view('tccmaterias.details')->with('detailpage',$tccmateria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TccMateria  $tccMateria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tccmateria = TccMateria::findOrFail($id);
        return view('tccmaterias.edit',compact('tccmateria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TccMateria  $tccMateria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nome_materia' =>'required',
        ]);

        $tccmateria = TccMateria::find($id);
        $tccmateria->nome_maateria = $request->nome_materia;
        $tccmateria->save();
        return redirect()->route('tccmaterias')->with('message', 'Tcc Materia editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TccMateria  $tccMateria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tccmateria = TccMateria::findOrFail($id);
        $tccmateria->delete();
        return redirect()->route('tccmaterias.index')->with('alert-success','TccMateria hasbeen deleted!');
    }
}
