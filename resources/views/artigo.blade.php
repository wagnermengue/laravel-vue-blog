@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="{{$artigo->titulo}}">

            <h2>{{$artigo->titulo}}</h2>

        </painel>
    </pagina>
@endsection
