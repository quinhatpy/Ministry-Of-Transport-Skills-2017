<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $table = 'hotel_image';
    public $timestamps = false;
    protected $hidden = ['id', 'hotel_id'];
}
