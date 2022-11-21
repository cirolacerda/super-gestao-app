@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto; ">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                                <td><a href="{{ route('produto.destroy', $produto->id) }}">Excluir</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{$produtos->appends($request)->links('pagination::bootstrap-4')}}
                <!--
                <br>
                {{$produtos->count()}} - Total de registros por página
                <br>
                {{$produtos->total()}} - Total de registros da consulta
                -->
                <br>
                Exibindo {{ $produtos->count()}} produto(s) de {{ $produtos->total()}} (de {{ $produtos->firstItem()}} a {{ $produtos->lastItem()}})

            </div>
        </div>

    </div>

@endsection