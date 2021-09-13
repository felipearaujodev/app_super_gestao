<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //3 exemplos de inserção, o último exemplo usando DB não é recomendado por não preencher as datas de criação automaticamente pelo eloquent
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'fornecedor1.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'contato@fornecedor1.com.br';
        $fornecedor->save();

        Fornecedor::create([
            "nome"=>"Fornecedor 2",
            "site"=>"Fornecedor2.com.br",
            "uf"=>"CE",
            "email"=>"contato@fornecedor2.com.br"
        ]);

        DB::table("fornecedores")->insert([
            "nome"=>"Fornecedor 3",
            "site"=>"Fornecedor3.com.br",
            "uf"=>"GO",
            "email"=>"contato@fornecedor3.com.br"
        ]);
    }
}
