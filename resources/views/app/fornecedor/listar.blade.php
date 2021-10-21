@extends('app.layouts.basico')

@section('titulo', 'Fornecedores')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informação-pagina">
        <div style="width:90%;margin-left:auto;margin-right:auto;">

            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <th>{{$fornecedor->nome}}</th>
                            <th>{{$fornecedor->site}}</th>
                            <th>{{$fornecedor->uf}}</th>
                            <th>{{$fornecedor->email}}</th>
                            <th><a href="{{route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></th>
                            <th><a href="{{route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></th>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de Produtos</p>
                                <table border="1" style="margin:20px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fornecedor->produtos as $item)
                                            
                                        
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->nome}}</td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $fornecedores->appends($request)->links() }}

            <!--
            Total página - {{ $fornecedores->count() }}
            <br>
            Total - {{ $fornecedores->total() }}
            <br>
            Número do primeiro registro da página - {{ $fornecedores->firstItem() }}
            <br>
            Número do último registro da página - {{ $fornecedores->lastItem() }}
            -->

            Exibindo {{$fornecedores->count()}} fornecedor(es) de {{$fornecedores->total()}} (de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}})
            
        </div>
    </div>
</div>

@endsection