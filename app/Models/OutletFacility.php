<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutletFacility extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_outlet_facility';

    protected $fillable = [
        'id_outlet', 'icon_outlet_facility', 'description_outlet_facility'
    ];
}
