<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['as' =>'index','uses'=>'indexController@index']);

Route::group(['middleware' => ['web']],function (){
    Route::resource('/','IndexController@index');
});


//relatório

    Route::get('/relatorio_ver',  ['uses'=>'RelatoriosController@relatoriosVer', 'as'=>'relatorios.ver']);



Route::group(['middleware' => 'auth'],function (){

    Route::get('/associar-aluno', array('as' => 'associar_aluno', function()
    {
        return view('associar-aluno');
    }));


    Route::get('/associar-aluno/{id}',['as' =>'associar_aluno','uses'=>'AssociarAlunoController@index']);

    Route::get('/selecionar-projeto/{id}',['as' =>'associar_aluno_projeto','uses'=>'projetoListController@index']);

    Route::get('/usuarios',['as' =>'usuarios','uses'=>'UserController@load']);


//    Route::get('/usuarios', function () {
//        return view('usuarios');
//    });
//
//    Route::get('/usuarios', array('as' => 'usuarios', function()
//    {
//        return view('usuarios');
//    }));

    Route::get('/cadastro_de_projeto', array('as' => 'cadastro_de_projeto', function()
    {
        return view('cadastro_de_projeto');
    }));

    Route::post('/insert','Controller@insert');

    Route::post('/insereProjeto','Controller@insereProjeto');

    Route::post('/usuarios/list','\App\Http\Controllers\UserController@store');

    Route::get('list', function()
    {
        return view('/list');
    });

    Route::resource('list','\App\Http\Controllers\UserController');

    Route::put('/list/{id}','UserController@update');

    Route::get('/termo', function () {
        return view('termo');
    });
    Route::get('/termo2', function () {
        return view('termo2');
    });

    Route::get('/templates', function () {
        return view('templates');
    });
    Route::get('/templates','ArquivosController@store');

    Route::get('/upload', function () {
        return view('upload');
    });

    Route::get('/invoice', function () {

        return view('invoice');
        $pdf = PDF::loadView('invoice');
        return $pdf->download('CARTA DE ACEITACAO DE ORIENTACAO.pdf');

    });

    Route::get('/invoice2', function () {
        return view('invoice2');
        $pdf = PDF::loadView('invoice2');
        return $pdf->download('Confirmação de Orientação em Projeto De TCC II.pdf');
    });

    Route::get('/btnTermo', array('as' => 'btnTermo', function()
    {
        $pdf = PDF::loadView('invoice');
        return $pdf->download('CARTA DE ACEITACAO DE ORIENTACAO.pdf');
    }));

    Route::get('/btnTermo2', array('as' => 'btnTermo2', function()
    {
        $pdf = PDF::loadView('invoice2');
        return $pdf->download('Confirmação de Orientação em Projeto De TCC II.pdf');
    }));

    Route::group(['middleware' => ['web']],function (){
        Route::resource('arquivos','ArquivosController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('atuacoes','AtuacaoController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('cronogramas','CronogramaController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('cursos','CursoController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('projetos','ProjetoController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('solicitacao','SolicitacaoController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('tccmaterias','TccMateriaController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('tipoentregas','TipoEntregaController');
    });

    Route::group(['middleware' => ['web']],function (){
        Route::resource('user','UserController');
    });



});

Auth::routes();

Route::get('/home', 'HomeController@index');
