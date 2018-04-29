@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            <tabela-lista
                    v-bind:titulos="['#', 'Título', 'Data']"
                    v-bind:itens="[[1, 'PHP', '17/87'],[2, 'Vue', '15/47']]"
                    criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="768768"
                    ordem="ASC" ordemcol="1" modal="sim"
            >
            </tabela-lista>
        </painel>
    </pagina>
    <modal nome="adicionar">
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

    <modal nome="editar">
        <painel titulo="Editar">
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

    <modal nome="detalhe">
        <painel titulo="Detalhe">
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
