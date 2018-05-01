@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Artigos">

            <p>
            <form class="form-inline text-center" action="{{route('site')}}" method="get" >
                <input type="search" class="form-control" name="busca" placeholder="Buscar" value="{{isset($busca) ? $busca : ""}}">
                <button class="btn btn-info">Buscar</button>
            </form>

            </p>

            <div class="row">
                @foreach($lista as $item)
                    <artigo-card
                        titulo="{{$item->titulo}}"
                        descricao="{{str_limit($item->descricao, 40, '...')}}"
                        link="{{route('artigo', [$item->id, str_slug($item->titulo)])}}"
                        imagem="https://thumbs.dreamstime.com/z/blank-notepad-over-laptop-coffee-cup-office-wooden-table-35295571.jpg"
                        alt="Alt da imagem"
                        autor="{{$item->autor}}"
                        data="{{$item->data}}"
                        sm=""
                        md=""
                    ></artigo-card>
                @endforeach
            </div>
            <div>
                {{$lista->links()}}
            </div>
        </painel>
    </pagina>
@endsection
