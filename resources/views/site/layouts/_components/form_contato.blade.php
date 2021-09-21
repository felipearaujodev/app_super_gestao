{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe_borda }}">
    {{ $errors->has('nome') ? $errors->first('nome') : "" }}
    <br>

    <input name="ddd" value="{{ old('ddd') }}" type="text" placeholder="DDD" class="{{ $classe_borda }}">
    {{ $errors->has('ddd') ? $errors->first('ddd') : "" }}

    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe_borda }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : "" }}
    <br>

    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe_borda }}">
    {{ $errors->has('email') ? $errors->first('email') : "" }}
    <br>
 
    <select name="motivo_contatos_id" class="{{ $classe_borda }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key=>$value)
            <option value="{{ $value->id }}" {{old('motivo_contatos_id') == $value->id ? 'selected' : ''}}>{{ $value->motivo_contatos }}</option>

        @endforeach
  
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : "" }}
    <br>
    
    <textarea name="mensagem" class="{{ $classe_borda }}">{{ (old('mensagem') != '') ? old('mensagem') : "Preencha aqui a sua mensagem." }}
    </textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : "" }}
    <br>
    
    <button type="submit" class="{{ $classe_borda }}">ENVIAR</button>
</form>

