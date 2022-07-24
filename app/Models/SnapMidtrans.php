<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnapMidtrans extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_snap_midtrans';

    protected $fillable = [
        'id_booking', 'snap_token', 'redirect_url'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking', 'id_booking');
    }
}
