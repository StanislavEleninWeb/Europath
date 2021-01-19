<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    /**
     * Get the regions
     */
    public function regions()
    {
        return $this->hasMany(\App\Models\Region::class);
    }

}
