<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'picture', 'group'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        if (is_null($this->last_name)) {
            return "{$this->name}";
        }

        return "{$this->name} {$this->last_name}";
    }

    /**
     * Set the user's password.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get group of user
     * @return Group|null Group of user
     */
    public function getGroup(): Group {
        return Group::where('id', Auth::user()->group)->first();
    }

    /**
     * Get permissions of user
     * @return array Array of permissions
     */
    public function getPermissions(): array {
        return GroupPermission::where('group_id', Auth::user()->group)->get();
    }

    /**
     * Is user permitted
     * @param $permission_name string Permission Name
     * @return bool
     */
    public function hasPermission(string $permission_name): bool {
        foreach ($this->getPermissions() as $permission) {
            if ($permission === $permission_name || $permission === '*') {
                return true;
            }
        }

        return false;
    }
}
