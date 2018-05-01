<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (\Illuminate\Http\Request $request) {

    if(isset($request->busca) && $request->busca != ""){
        $busca = $request->busca;
        $lista = \App\Artigo::listaArtigosSite(3,$busca);
    }else{
        $lista = \App\Artigo::listaArtigosSite(3);
        $busca = "";
    }

    return view('site',compact('lista','busca'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigo = \App\Artigo::find($id);
    if($artigo){
        return view('artigo', compact('artigo'));
    }
    return redirect()->route('site');
})->name('artigo');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:ehAutor');

Route::middleware('auth')->prefix('admin')->namespace('admin')->group(function(){
    Route::resource('artigos', 'ArtigosController')->middleware('can:ehAutor');
    Route::resource('usuarios', 'UsuariosController')->middleware('can:ehAdmin');
    Route::resource('autores', 'AutoresController')->middleware('can:ehAdmin');
    Route::resource('adm', 'AdmController')->middleware('can:ehAdmin');
});
