<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato;
        $contato->nome = 'Contato Novo';
        $contato->ddd = '11';
        $contato->telefone = '4666666';
        $contato->email = 'contato@contatonovo.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Gostaria de conhecer o sistema.';
        $contato->save();*/

        factory(SiteContato::class, 100)->create();

        /*SiteContato::factory()
                        ->count(100)
                        //->hasPosts(1)
                        ->create();*/

    }
}
