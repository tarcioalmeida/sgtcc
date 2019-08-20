<?php
namespace App\Http\Controllers;

use App\Arquivos;

use Illuminate\Http\Request;
use DB;

class ArquivosController extends Controller
{
    public function index()
    {
        return view('templates')->with('arquivos', Arquivos::get());
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',

        ]);
        $arquivo = new Arquivos;

        if(is_null($request->input('nome'))){
            $arquivo->nome = str_replace('.'.$request->arquivo->extension(),'',$request->arquivo->getClientOriginalName());
        }else{
            $arquivo->nome = $request->input('nome');
        }
        $arquivo->tamanho = $request->arquivo->getClientSize();
        $arquivo->tipo = $request->arquivo->extension();
        $arquivo->caminho = 'assets/arquivos/'.$request->arquivo->storeAs('', str_slug($arquivo->nome).'.'.$arquivo->tipo, 'upl_arquivos');
        $arquivo->save();
        return back()->with('mensagem', "Upload do arquivo '{$arquivo->nome}' realizado com sucesso.");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Arquivos::findOrFail($id);
        $data->delete();

        return redirect('/templates');
    }


}