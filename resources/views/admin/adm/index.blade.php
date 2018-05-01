@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de administradores">
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
                    v-bind:titulos="['#', 'Nome', 'E-mail']"
                    v-bind:itens="{{json_encode($listaModelo)}}"
                    criar="#criar" detalhe="/admin/adm/" editar="/admin/adm/" deletar="/admin/amd/" token="{{csrf_token()}}"
                    ordem="ASC" ordemcol="1" modal="sim"
            >
            </tabela-lista>
            <div>
                {{$listaModelo->links()}}
            </div>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="form-adicionar" css="" action="{{route('adm.store')}}" method="post" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
            </div>
            <div class="form-group">
                <label for="admin">Administrador</label>
                <select class="form-control" id="admin" name="admin">
                    <option {{(old('admin')&& old('admin') == 'N' ) ? 'selected' : ''}} value="N">Não</option>
                    <option {{(old('admin')&& old('admin') == 'S' ) ? 'selected' : ''}} value="S">Sim</option>
                </select>
            </div>
        </formulario>
        <span slot="botoes">
            <button form="form-adicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="form-editar" css="" v-bind:action="'/admin/adm/'+$store.state.item.id" method="put" enctype="" token="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" v-model="$store.state.item.name">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" v-model="$store.state.item.email">
            </div>
            <div class="form-group">
                <label for="admin">Administrador</label>
                <select class="form-control" id="admin" name="admin" v-model="$store.state.item.admin">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="form-editar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
        {{-- com @ na frente identifico ao blade que é algo do js --}}
        <p>@{{ $store.state.item.name }}</p>
        <p>@{{ $store.state.item.email}}</p>
    </modal>
@endsection
