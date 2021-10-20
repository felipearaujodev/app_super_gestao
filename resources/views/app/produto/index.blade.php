@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Produtos</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.create') }}">Novo</a></li>
            <li><a href="{{ route('produto.index') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informação-pagina">
        <div style="width:90%;margin-left:auto;margin-right:auto;">

            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($produtos as $produto)                   
                        <tr>
                            <th>{{$produto->nome}}</th>
                            <th>{{$produto->descricao}}</th>
                            <th>{{ $produto->fornecedor->nome }}</th>
                            <th>{{$produto->peso}}</th>
                            <th>{{$produto->unidade_id}}</th>
                            <th>{{$produto->itemDetalhe->comprimento ?? ''}}</th>
                            <th>{{$produto->itemDetalhe->altura ?? ''}}</th>
                            <th>{{$produto->itemDetalhe->largura ?? ''}}</th>
                            <th><a href="{{ route('produto.show', [ 'produto' => $produto->id ]) }}">Visualizar</a></th>
                            <th><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></th>
                            <th>
                                <form id="form_{{ $produto->id }}" method="POST" action="{{ route('produto.destroy', ['produto'=>$produto->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $produtos->appends($request)->links() }}

            <!--
            Total página - {{ $produtos->count() }}
            <br>
            Total - {{ $produtos->total() }}
            <br>
            Número do primeiro registro da página - {{ $produtos->firstItem() }}
            <br>
            Número do último registro da página - {{ $produtos->lastItem() }}
            -->

            Exibindo {{$produtos->count()}} produto(s) de {{$produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
            
        </div>
    </div>
</div>

@endsection