@if (isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('pedido.store') }}" method="POST">
@endif
@csrf
<select name="cliente_id" id="cliente_id">
    <option value="">Selecione um cliente</option>

    @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}"
            {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>
            {{ $cliente->nome }}</option>
    @endforeach

</select>
{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}


@if (isset($pedido->id))
    <button type="submit" class="borda-preta">Atualizar</button>
@else
    <button type="submit" class="borda-preta">Cadastrar</button>
@endif

</form>
