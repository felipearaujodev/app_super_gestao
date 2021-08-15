<h3>Fornecedor</h3>

{{--  comentários da aplicação --}}

@php

    

@endphp


@for($i=0; isset($fornecedores[$i]); $i++)

    Fornecedor: {{ $fornecedores[$i]['nome'] }}
    <hr>

@endfor
@dd($fornecedores)
