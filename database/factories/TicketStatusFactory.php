<?php

/** @var Factory $factory */

use App\Models\TicketStatus;
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

$factory->define(TicketStatus::class, function (Faker $faker) {
    return [
        'title' => 'New Status',
        'color' => '#ff0000',
        'creacreator_idor_id' => 0,
    ];
});
