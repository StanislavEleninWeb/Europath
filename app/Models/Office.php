<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'manager_id',
        'address',
        'opening_hours',
    ];

    /**
     * Get the cities that owns the office.
     */
    public function cities()
    {
        return $this->belongsToMany(\App\Models\City::class);
    }

    /**
     * Get the cars
     */
    public function cars()
    {
        return $this->hasMany(\App\Models\Car::class, 'office_car')->withTimestamps();
    }

    /**
     * Get the couriers
     */
    public function couriers()
    {
        return $this->hasMany(\App\Models\Courier::class);
    }

    /**
     * Get all of the office's phones.
     */
    public function phones()
    {
        return $this->morphMany(\App\Models\Phone::class, 'phoneable');
    }

    /**
     * Get the user that owns the office.
     */
    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id', 'id');
    }

}
