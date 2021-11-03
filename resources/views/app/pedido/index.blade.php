@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Pedidos</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>

    <div class="informação-pagina">
        <div style="width:90%;margin-left:auto;margin-right:auto;">

            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($pedidos as $pedido)                   
                        <tr>
                            <th>{{$pedido->id}}</th>
                            <th>{{$pedido->cliente_id}}</th>
                            <th><a href="{{ route('pedido-produto.create', ['pedido'=>$pedido->id]) }}">Adicionar Produtos</a></th>
                            <th><a href="{{ route('pedido.show', [ 'pedido' => $pedido->id ]) }}">Visualizar</a></th>
                            <th><a href="{{ route('pedido.edit', [ 'pedido' => $pedido->id]) }}">Editar</a></th>
                            <th>
                                <form id="form_{{ $pedido->id }}" method="POST" action="{{ route('pedido.destroy', ['pedido'=>$pedido->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $pedidos->appends($request)->links() }}

            <!--
            Total página - {{ $pedidos->count() }}
            <br>
            Total - {{ $pedidos->total() }}
            <br>
            Número do primeiro registro da página - {{ $pedidos->firstItem() }}
            <br>
            Número do último registro da página - {{ $pedidos->lastItem() }}
            -->

            Exibindo {{$pedidos->count()}} pedido(s) de {{$pedidos->total()}} (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})
            
        </div>
    </div>
</div>

@endsection