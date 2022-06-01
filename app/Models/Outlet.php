<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_outlet';

    protected $fillable = [
        'outlet_name', 'outlet_location_longitude', 'outlet_location_langitude', 'opening_hours',
        'closing_hours', 'instagram_link', 'price_outlet_per_hour'
    ];
}
