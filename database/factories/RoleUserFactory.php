<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;
use App\RoleUser;

$factory->define(RoleUser::class, function (Faker $faker) {
	$end_number = \App\Role::count();
    return [
        'role_id' => rand(1,\App\Role::count()),
        // 'role_id' => $faker->unique()->numberBetaween(rand(1,$end_number)),
    ];
});
