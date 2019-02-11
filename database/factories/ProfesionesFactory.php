<?php

use Faker\Generator as Faker;

$factory->define(App\Profesiones::class, function (Faker $faker) {
    return [
       'titulo' => $faker->sentence(3,false)
    ];
});
