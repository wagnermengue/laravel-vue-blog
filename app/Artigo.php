<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'data'];

    protected $dates = ['deleted_at'];

    public static function listaArtigos($paginacao)
    {
        /*
        $listaArtigos = Artigo::select('id', 'titulo', 'descricao', 'user_id', 'data')->paginate(2);
        foreach ($listaArtigos as $value){
            $value->user_id = User::find($value->user_id)->name;
        }
        */

        $user = auth()->user();
        if($user->admin == 'S'){
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select('artigos.id', 'artigos.titulo', 'artigos.descricao', 'users.name', 'artigos.data')
                ->whereNull('deleted_at')
                ->paginate($paginacao);
        }else{
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select('artigos.id', 'artigos.titulo', 'artigos.descricao', 'users.name', 'artigos.data')
                ->whereNull('deleted_at')
                ->where('artigos.user_id', '=', $user->id)
                ->paginate($paginacao);
        }


        return $listaArtigos;
    }

    public static function listaArtigosSite($paginacao = 3, $busca = null)
    {

        if($busca){
            $listaArtigos = DB::table('artigos')
                ->join('users','users.id','=','artigos.user_id')
                ->select('artigos.id','artigos.titulo','artigos.descricao','users.name as autor','artigos.data')
                ->whereNull('deleted_at')
                ->whereDate('data','<=',date('Y-m-d'))
                ->where(function($query) use ($busca){
                    $query->orWhere('titulo','like','%'.$busca.'%')
                        ->orWhere('descricao','like','%'.$busca.'%');
                })
                ->orderBy('data','DESC')
                ->paginate($paginacao);
        }else{
            $listaArtigos = DB::table('artigos')
                ->join('users', 'users.id', '=', 'artigos.user_id')
                ->select('artigos.id', 'artigos.titulo', 'artigos.descricao', 'users.name as autor', 'artigos.data')
                ->whereNull('deleted_at')
                ->whereDate('artigos.data','<=',date('Y-m-d'))
                ->orderBy('artigos.data', 'DESC')
                ->paginate($paginacao);
        }

        return $listaArtigos;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
