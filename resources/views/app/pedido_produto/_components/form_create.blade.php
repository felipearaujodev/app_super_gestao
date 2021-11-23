<form method="POST" action="{{ route('pedido-produto.store', ['pedido'=>$pedido]) }}">
    @csrf


    <select name="produto_id">
        <option>--Selecione um produto--</option>
        @foreach($produtos as $produto)
            <option value="{{ $produto->id }}" 
                {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                
                {{ $produto->nome }}
            </option>
        @endforeach
        
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="number" class="borda-preta" placeholder="Quantidade" name="quantidade" value="{{ old('quantidade') ?? ''}}">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>