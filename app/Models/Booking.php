<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_booking';

    protected $fillable = [
        'order_id', 'id_user', 'id_outlet', 'total_payment', 'days', 'status'
    ];

    public function snapMidtrans()
    {
        return $this->hasOne(SnapMidtrans::class, 'id_booking', 'id_booking');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id_outlet');
    }
}
