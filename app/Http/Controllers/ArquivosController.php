<?php

namespace App\Http\Controllers;

use App\Arquivos;
use FontLib\Table\Type\name;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArquivosController extends Controller
{
    public function index()
    {
        return view('templates')->with('arquivos', Arquivos::get());
    }
//Adicionar
    public function store(Request $request)
    {

        /*
        * O campo do form com o arquivo tinha o atributo name="file".
        */
        $file = $request->file('file');

        if (empty($file)) {
            abort(400, 'Nenhum arquivo foi enviado.');
        }

        $path = $file->store('uploads');
        $file->save();
        return back();
    }

    //Excluir
    public function destroy(Request $request) {
       Arquivos::destroy($request->id);
        return redirect('/templates');
    }

    //Download
    public function download()
    {


    }





}
