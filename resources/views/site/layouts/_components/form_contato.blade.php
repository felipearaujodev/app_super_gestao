{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe_borda }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe_borda }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe_borda }}">
    <br>
    <select name="motivo_contato" class="{{ $classe_borda }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe_borda }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $classe_borda }}">ENVIAR</button>
</form>