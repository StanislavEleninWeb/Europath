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
        return $this->belongsTo(\App\Models\Office::class);
    }

    /**
     * Get the car's courier.
     */
    public function courier()
    {
        return $this->belongsToMany(\App\Models\Courier::class, 'courier_car')->withPivot('deleted_at', 'created_at', 'updated_at');
    }
}
