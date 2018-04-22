@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <tabela-lista
                    v-bind:titulos="['#', 'Título', 'Data']"
                    v-bind:itens="[[1, 'PHP', '17/87'],[2, 'Vue', '15/47']]"
                    criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="768768"
                    ordem="ASC" ordemCol="1"
            >
            </tabela-lista>
        </painel>
    </pagina>
@endsection
