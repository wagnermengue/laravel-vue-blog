@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Dashboard">
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
                    <caixa qtd="300" titulo="Compras" url="#" cor="" icone=""></caixa>
                </div>
                <div class="col-md-4">
                    <caixa qtd="490" titulo="Usuários" url="#" cor="orange" icone="ion-social-snapchat"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa qtd="1120" titulo="Requests" url="#" cor="green" icone="ion-android-hand"></caixa>
                </div>
            </painel>
            <painel titulo="Conteúdo 2">
                Teste de conteúdo
            </painel>
        </painel>
    </pagina>
@endsection
