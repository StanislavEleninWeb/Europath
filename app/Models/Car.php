<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * Get the office that owns the car.
     */
    public function region()
    {
        return $this->belongsTo(\App\Models\Office::class);
    }
}
