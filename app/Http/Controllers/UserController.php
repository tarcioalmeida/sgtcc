<?php

namespace App\Http\Controllers;

use App\Atuacao;
use App\Curso;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    private $id;
    public function __construct(User $id)
    { $this->id=$id;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index( )
    {
        $user = User::all();

        return view('/list',['user'=>$user]);
    }

    public function load(){
        $cursos = Curso::all();
        $atuacao = DB::select(DB::raw("select * from atuacao where id <> 1"));

//        $atuacao = Atuacao::all();

        $info = [];
        $info["cursos"]=$cursos;
        $info["atuacao"]=$atuacao;

        return View('/usuarios',['info'=>$info]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('/usuarios');
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
            'name' =>'required',
            'email'  =>'required',
            'password'  =>'required',
            'matricula'  =>'required',
            'telefone'  =>'required',
            'curso_id'  =>'required',
            'atuacao'  =>'required',
        ]);

        $user = new User;
        $user->nome = $request->name." ".$request->sobrenome;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->matricula = $request->matricula;
        $user->telefone = $request->telefone;
        $user->curso_id = $request->curso_id;
        $user->atuacao_id = $request->atuacao;

        $user->save();

       return redirect()->route('list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        return view('user.details')->with('detailpage',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $this->validate($request, [
            'nome' =>'required',
            'email'  =>'required',
            'password'  =>'required',
            'matricula'  =>'required',
            'telefone'  =>'required',
            'curso_id'  =>'required',
            'atuacao_id'  =>'required',

        ]);
        $user= User::findOrFail($id);

        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->matricula = $request->matricula;
        $user->telefone = $request->telefone;
        $user->curso_id = $request->curso_id;
        $user->atuacao_id = $request->atuacao_id;

         $user->save();

         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('alert-success','Uauario hasbeen deleted!');
    }

    public function tests()
    {
   $insert= $this->user->create([
        'nome'=> 'lola',
        'email' =>'hotmail.com',
        'password'=>'lola',
        'matricula'=>'0715196',
        'telefone'=>'33064301',
        'curso_id'=>'1',
        'atuacao_id'=>'1'
    ]);

        if($insert)
            return'cadastrando..';
        else
            return'falha';
    }

}
