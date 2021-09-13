{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe_borda }}">
    <br>
    <input name="ddd" value="{{ old('ddd') }}" type="text" placeholder="DDD" class="{{ $classe_borda }}">
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe_borda }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe_borda }}">
    <br>
 
    <select name="motivo_contato" class="{{ $classe_borda }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key=>$value)
            <option value="{{ $key }}" {{old('motivo_contato') == $key ? 'selected' : ''}}>{{ $value }}</option>

        @endforeach
  
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe_borda }}">{{ (old('mensagem') != '') ? old('mensagem') : "Preencha aqui a sua mensagem." }}
    </textarea>
    <br>
    <button type="submit" class="{{ $classe_borda }}">ENVIAR</button>
</form>

<div>
    {{ print_r($errors) }}
</div>