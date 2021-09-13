<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        "nome"=> $faker->name,
        "ddd"=> 11,
        "telefone"=>$faker->randomNumber(9, false),
        "email"=> $faker->unique()->email,
        "motivo_contato"=> $faker->numberBetween(1,3),
        "mensagem"=>$faker->text(300)
    ];
});
