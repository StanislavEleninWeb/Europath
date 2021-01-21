<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region_id', 'post_code', 'name', 'name_en'
    ];

    /**
     * Get the region that owns the city.
     */
    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }

    /**
     * Get the offices
     */
    public function offices()
    {
        return $this->belongsToMany(\App\Models\Office::class);
    }

}
