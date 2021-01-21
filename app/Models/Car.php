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
    public function office()
    {
        return $this->belongsTo(\App\Models\Office::class, 'office_car');
    }

    /**
     * Get the car's courier.
     */
    public function courier()
    {
        return $this->hasOneThrough(\App\Models\Courier::class, \App\Models\CourierCar::class);
    }
}
