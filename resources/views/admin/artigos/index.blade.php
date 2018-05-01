@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            @if($errors->all())
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->all() as $value)
                        <li><strong>{{$value}}</strong></li>
                    @endforeach
                </div>
            @endif

            <tabela-lista
                    v-bind:titulos="['#', 'Título', 'Descrição', 'Usuário', 'Data']"
                    v-bind:itens="{{json_encode($listaArtigos)}}"
                    criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{csrf_token()}}"
                    ordem="ASC" ordemcol="1" modal="sim"
            >
            </tabela-lista>
            <div>
                {{$listaArtigos->links()}}
            </div>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="form-adicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
            </div>
            <div class="form-group">
                <label for="titulo">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{old('descricao')}}">
            </div>
            <div class="form-group">
                <label for="adicionarConteudo">Conteúdo</label>
                <ckeditor
                        name="conteudo" id="adicionarConteudo" value="{{old('conteudo')}}"
                        v-bind:config="{
                                toolbar: [
                                  [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                                ],
                                height: 200
                        }">
                </ckeditor>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" class="form-control" id="data" name="data" value="{{old('data')}}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="form-adicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="form-editar" css="" v-bind:action="'/admin/artigos/'+$store.state.item.id" method="put" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" v-model="$store.state.item.titulo">
            </div>
            <div class="form-group">
                <label for="titulo">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" v-model="$store.state.item.descricao">
            </div>
            <div class="form-group">
                <label for="editarConteudo">Conteúdo</label>
                <ckeditor
                        name="conteudo" id="editarConteudo" v-model="$store.state.item.conteudo"
                        v-bind:config="{
                                toolbar: [
                                  [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                                ],
                                height: 200
                        }">
                </ckeditor>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="datetime-local" class="form-control" id="data" name="data" v-model="$store.state.item.data">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="form-editar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        {{-- com @ na frente identifico ao blade que é algo do js --}}
        <p>@{{ $store.state.item.descricao }}</p>
        <p>@{{ $store.state.item.conteudo }}</p>
        <p>@{{ $store.state.item.data }}</p>
    </modal>
@endsection
