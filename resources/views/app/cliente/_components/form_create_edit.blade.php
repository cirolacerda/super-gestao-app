@if (isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('cliente.store') }}" method="POST">
@endif
@csrf

<input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}


@if (isset($cliente->id))
    <button type="submit" class="borda-preta">Atualizar</button>
@else
    <button type="submit" class="borda-preta">Cadastrar</button>
@endif

</form>
