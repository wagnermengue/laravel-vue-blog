@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Dashboard">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            Teste de conteúdo

            <div class="row">
                <div class="col-md-4">
                    <painel titulo="Conteúdo Interno 1" cor="panel-danger">
                        Teste de conteúdo
                    </painel>
                </div>
                <div class="col-md-4">
                    <painel titulo="Conteúdo Interno 2" cor="orange">
                        Teste de conteúdo
                    </painel>
                </div>
                <div class="col-md-4">
                    <painel titulo="Conteúdo Interno 3" cor="panel-primary">
                        Teste de conteúdo
                    </painel>
                </div>
            </div>

            <painel titulo="Conteúdo 1">
                <div class="col-md-4">
                    <caixa qtd="{{$totalArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="" icone=""></caixa>
                </div>
                <div class="col-md-4">
                    <caixa qtd="{{$totalUsuarios}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="orange" icone="ion-social-snapchat"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa qtd="{{$totalAutores}}" titulo="Autores" url="{{route('autores.index')}}" cor="green" icone="ion-android-hand"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa qtd="{{$totalAdms}}" titulo="Administradores" url="{{route('adm.index')}}" cor="green" icone="ion-android-hand"></caixa>
                </div>
            </painel>
            <painel titulo="Conteúdo 2">
                Teste de conteúdo
            </painel>
        </painel>
    </pagina>
@endsection
