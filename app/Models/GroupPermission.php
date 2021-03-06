<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'permission_name', 'creator_id'
    ];

    /**
     * @return User|null
     */
    public function getCreatorUser(): ?User
    {
       return User::where('id', $this->creator_id)->first();
    }
}
