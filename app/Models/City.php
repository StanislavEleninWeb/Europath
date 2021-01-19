<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Get the region that owns the city.
     */
    public function province()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }

    /**
     * Get the offices
     */
    public function offices()
    {
        return $this->hasMany(\App\Models\Office::class);
    }

}
