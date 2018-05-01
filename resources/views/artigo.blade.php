@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel>

            <h2>{{$artigo->titulo}}</h2>
            <h4>{{$artigo->descricao}}</h4>
            <p>{!! $artigo->conteudo  !!}</p>
            <small>Por: {{$artigo->user->name}} - {{ date('d/m/Y', strtotime($artigo->data)) }}</small>
        </painel>
    </pagina>
@endsection
