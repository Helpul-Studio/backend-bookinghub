<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_outlet';

    protected $fillable = [
        'outlet_name', 'outlet_location_longitude', 'outlet_location_latitude', 'opening_hours',
        'closing_hours', 'outlet_phone', 'instagram_link', 'price_outlet_per_hour'
    ];
}
