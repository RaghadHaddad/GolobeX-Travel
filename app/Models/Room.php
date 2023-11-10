<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'roomType',
        'bedNum',
        'startPrice',
        'hotel_id'
        
    ];

    public function roomBooking(){
        return $this->hasMany(RoomBooking::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
