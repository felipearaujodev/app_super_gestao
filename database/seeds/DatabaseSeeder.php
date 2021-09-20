<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(FornecedorSeeder::class);

        //php artisan db:seed --class SiteContatoSeeder, comando para executar apenas uma classe do seeder
       // $this->call(SiteContatoSeeder::class);

        $this->call([
            FornecedorSeeder::class,
            SiteContatoSeeder::class,
            MotivoContatoSeeder::class
        ]);
    }
}
