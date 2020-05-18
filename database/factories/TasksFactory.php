<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $user = User::inRandomOrder()->value('id');
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'status' => 'View',
        'user_id' => $user,
    ];
});
