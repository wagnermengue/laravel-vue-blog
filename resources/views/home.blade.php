@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
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
                        Teste de conteúdo
                    </painel>
                    <painel titulo="Conteúdo 2">
                        Teste de conteúdo
                    </painel>
                </painel>
            </div>
        </div>
    </div>
@endsection
