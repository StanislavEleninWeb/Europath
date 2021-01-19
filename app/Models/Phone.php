<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    /**
     * Get the parent imageable model (user or post).
     */
    public function phoneable()
    {
        return $this->morphTo();
    }

}
