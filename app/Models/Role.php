<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Get the users that has the role.
     */
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_role');
    }
}
