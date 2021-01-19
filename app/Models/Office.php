<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    /**
     * Get the city that owns the office.
     */
    public function city()
    {
        return $this->belongsToMany(\App\Models\City::class);
    }

    /**
     * Get the cars
     */
    public function cars()
    {
        return $this->hasMany(\App\Models\Car::class);
    }

    /**
     * Get the couriers
     */
    public function couriers()
    {
        return $this->hasMany(\App\Models\Courier::class);
    }

    /**
     * Get the phones
     */
    public function phones()
    {
        return $this->hasMany(\App\Models\Phone::class);
    }

}
