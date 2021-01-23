<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourierCar extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courier_car';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deleted_at',
    ];

    /**
     * The roles that belong to the user.
     */
    public function cars()
    {
        return $this->belongsToMany(\App\Models\Car::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function couriers()
    {
        return $this->belongsToMany(\App\Models\Courier::class);
    }

}
