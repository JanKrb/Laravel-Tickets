<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting_name', 'setting_value'
    ];
}
