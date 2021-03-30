<?php

use App\Models\Group;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Group::class, function (Faker $faker) {
    return [
        'group_name' => 'New Group',
        'group_color' => $faker->unique()->hexColor,
        'default_group' => false,
        'creator_id' => 0
    ];
});
