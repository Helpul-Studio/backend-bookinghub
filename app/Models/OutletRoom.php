<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutletRoom extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_outlet_room';
    
    protected $fillable = [
        'id_outlet',
        'outlet_room_number',
        'outlet_room_name',
        'outlet_room_status'
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id_outlet');
    }
}
