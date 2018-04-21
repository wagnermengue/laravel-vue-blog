@extends('layouts.app')

@section('content')
    <pagina>
        <painel titulo="Lista de artigos">
            <a href="#">Criar</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Autor</th>
                        <th>Data</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Titulo...</td>
                        <td>Descrição ...</td>
                        <td>Wagner</td>
                        <td>12/12/12</td>
                        <td>
                            <a href="#">Editar</a> |
                            <a href="#">Apagar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </painel>
    </pagina>
@endsection
