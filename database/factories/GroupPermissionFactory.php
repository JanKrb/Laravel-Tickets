<?php

use App\Models\GroupPermission;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(GroupPermission::class, function () {
    return [
        'group_id' => 0,
        'permission_name' => '',
        'creator_id' => 0
    ];
});
