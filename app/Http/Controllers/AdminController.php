<?php

namespace App\Http\Controllers;

use App\Artigo;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ['titulo' => 'Admin', 'url'=> ''],
        ]);
        $totalArtigos = Artigo::count();
        $totalUsuarios = User::count();
        $totalAutores = User::where('autor', '=', 'S')->count();
        return view('admin', compact('listaMigalhas', 'totalArtigos', 'totalUsuarios', 'totalAutores'));
    }
}
