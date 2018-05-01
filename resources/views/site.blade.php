@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Artigos">
            <div class="row">
                <artigo-card
                    titulo="Título do artigo"
                    descricao="Descrição do artigo"
                    link="#"
                    imagem="https://thumbs.dreamstime.com/z/blank-notepad-over-laptop-coffee-cup-office-wooden-table-35295571.jpg"
                    alt="Alt da imagem"
                    sm=""
                    md=""
                ></artigo-card>
            </div>
        </painel>
    </pagina>
@endsection
