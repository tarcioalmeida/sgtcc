<?php

namespace App\Http\Controllers;

use App\TipoEntrega;
use Illuminate\Http\Request;

class TipoEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoentregas = TipoEntrega::all();
        return view('TipoEntregas.index',['tipoentregasall'=>$tipoentregas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoentregas.create');
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
            'nome_entrega' =>'required',
        ]);

        $tipoentrega = new TipoEntrega;
        $tipoentrega->nome_entrega = $request->nome_entrega;
        $tipoentrega -> save();

        return redirect()->route('tipoentregas')->with('message', 'Tipo Entrega created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoEntrega= TipoEntrega::find($id);
        if(!$tipoEntrega){
            abort(404);
        }
        return view('tipoentregas.details')->with('detailpage',$tipoEntrega);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoEntrega= TipoEntrega::findOrFail($id);
        return view('tipoentregas.edit',compact('tipoEntrega'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome_entrega' =>'nome_entrega',
        ]);

        $tipoEntrega = TipoEntrega::find($id);
        $tipoEntrega->save();
        return redirect()->route('tipoentregas')->with('message', 'TipoEntrega editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoEntrega = TipoEntrega::findOrFail($id);
        $tipoEntrega ->delete();
        return redirect()->route('tipoentregas.index')->with('alert-success','TipoEntrega has been deleted!');
    }
}
