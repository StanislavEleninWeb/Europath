<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'name', 'name_en'
	];

    /**
     * Get the regions
     */
    public function regions()
    {
        return $this->hasMany(\App\Models\Region::class);
    }

    /**
     * Get all of the cities for the province.
     */
    public function cities()
    {
        return $this->hasManyThrough(\App\Models\City::class, \App\Models\Region::class);
    }

}
