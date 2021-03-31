<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketTagAssignment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'tag_id', 'creator_id'
    ];
}
