<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    /**
     * Get the office that owns the phone.
     */
    public function office()
    {
        return $this->belongsTo(\App\Models\Office::class);
    }

}
