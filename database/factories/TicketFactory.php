<?php

/** @var Factory $factory */

use App\Models\Ticket;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => 'New Ticket',
        'text' => 'New Ticket',
        'status_id' => 0,
        'department_id' => 0
    ];
});
