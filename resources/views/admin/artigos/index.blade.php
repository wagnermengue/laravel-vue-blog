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
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" v-model="$store.state.item.titulo">
                </div>
                <div class="form-group">
                    <label for="titulo">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" v-model="$store.state.item.descricao">
                </div>
                <button class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>

    <modal nome="detalhe">
        <painel v-bind:titulo="$store.state.item.titulo">
            {{-- com @ na frente identifico ao blade que é algo do js --}}
            <p>@{{ $store.state.item.descricao }}</p>
        </painel>
    </modal>
@endsection
