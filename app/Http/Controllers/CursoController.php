<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        $countProjeto = array();
        $count = 0;
        for ($i = 0; $i<count($cursos); $i++) {
            $count = DB::table('curso')->count();
//            $count = DB::table('projeto')->where('idCurso', $cursos[$i]->id)->count();

            //array_add($countProjeto,$cursos[$i]->id, $count);
        }

//        dd($countProjeto);
        return view('index',['cursos'=>$cursos, 'contProjeto'=>$countProjeto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
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
            'nome_curso' =>'required',
        ]);
        $curso = new Curso;
        $curso->nome_curso = $request->nome_curso;
        $curso->save();
        return redirect()->route('cursos')->with('message', 'Curso created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursos = Curso::find($id);
        if(!$cursos){
            abort(404);
        }
        return view('cursos.details')->with('detailpage',$cursos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome_curso' =>'nome_curso',
        ]);

        $curso = Curso::find($id);
        $curso->nome_curso = $request->nome_curso;
        $curso->save();
        return redirect()->route('cursos')->with('message', 'Curso editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect()->route('cursos.index')->with('alert-success','Curso hasbeen deleted!');
    }
}
