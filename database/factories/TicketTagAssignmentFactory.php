<?php

/** @var Factory $factory */

use App\Models\TicketTagAssignment;
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

$factory->define(TicketTagAssignment::class, function (Faker $faker) {
    return [
        'ticket_id' => 0,
        'tag_id' => 0,
        'creator_id' => 0,
    ];
});
