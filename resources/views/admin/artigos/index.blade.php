@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            <modal-link tipo="button" nome="mymodal" titulo="Abrir modal"></modal-link>
            <tabela-lista
                    v-bind:titulos="['#', 'Título', 'Data']"
                    v-bind:itens="[[1, 'PHP', '17/87'],[2, 'Vue', '15/47']]"
                    criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="768768"
                    ordem="ASC" ordemcol="1"
            >
            </tabela-lista>
        </painel>
    </pagina>
    <modal nome="mymodal">
        <painel titulo="Adicionar">
            <formulario css="" action="#" method="post" enctype="" token="">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="titulo">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
                </div>
                <button class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>
@endsection
