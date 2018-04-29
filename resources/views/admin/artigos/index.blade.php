@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            <tabela-lista
                    v-bind:titulos="['#', 'Título', 'Descrição']"
                    v-bind:itens="{{$listaArtigos}}"
                    criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="768768"
                    ordem="ASC" ordemcol="1" modal="sim"
            >
            </tabela-lista>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="form-adicionar" css="" action="#" method="post" enctype="" token="">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="titulo">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="form-adicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="form-editar" css="" action="#" method="post" enctype="" token="">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" v-model="$store.state.item.titulo">
            </div>
            <div class="form-group">
                <label for="titulo">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" v-model="$store.state.item.descricao">
            </div>
        </formulario>
        <span slot="botoes">
            <button class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        {{-- com @ na frente identifico ao blade que é algo do js --}}
        <p>@{{ $store.state.item.descricao }}</p>
    </modal>
@endsection
