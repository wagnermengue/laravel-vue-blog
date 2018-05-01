@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Artigos">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="https://thumbs.dreamstime.com/z/blank-notepad-over-laptop-coffee-cup-office-wooden-table-35295571.jpg" alt="Imagem">
                        <div class="caption">
                            <h3>Título</h3>
                            <p>Descrição</p>
                            <p><a href="#" class="btn btn-primary" role="button">Leia mais</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </painel>
    </pagina>
@endsection
