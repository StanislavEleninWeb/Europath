<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    /**
     * Get the office that owns the courier.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id');
    }

    /**
     * Get the office that owns the courier.
     */
    public function office()
    {
        return $this->belongsTo(\App\Models\Office::class);
    }

    /**
     * Get all of the courier's phones.
     */
    public function phones()
    {
        return $this->morphMany(\App\Models\Phone::class, 'phoneable');
    }

    /**
     * Get the car's owner.
     */
    public function car()
    {
        return $this->belongsToMany(\App\Models\Car::class, 'courier_car')->withPivot('deleted_at', 'created_at', 'updated_at');
    }
}
