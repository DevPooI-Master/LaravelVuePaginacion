<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'precio' => 10.2,
        'cantidad' => $faker->randomDigit()
    ];
});
