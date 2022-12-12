@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Pedido - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto; ">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID do Pedido</th>
                            <th>Cliente ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $pedido->id }}" method="POST"
                                        action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                </td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $pedidos->appends($request)->links('pagination::bootstrap-4') }}
                <!--
                                                                                                        <br>
                                                                                                        {{ $pedidos->count() }} - Total de registros por página
                                                                                                        <br>
                                                                                                        {{ $pedidos->total() }} - Total de registros da consulta
                                                                                                        -->
                <br>
                Exibindo {{ $pedidos->count() }} pedido(s) de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }}
                a {{ $pedidos->lastItem() }})

            </div>
        </div>

    </div>

@endsection
