<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id', 'name', 'name_en'
    ];

    /**
     * Get the province that owns the region.
     */
    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class);
    }

    /**
     * Get the cities
     */
    public function cities()
    {
        return $this->hasMany(\App\Models\City::class);
    }

}
