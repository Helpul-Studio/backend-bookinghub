<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageOutlet extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_image_outlet';

    protected $fillable = [
        'id_outlet', 'photo_outlet' 
    ];
}
