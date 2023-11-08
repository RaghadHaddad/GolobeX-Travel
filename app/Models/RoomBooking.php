<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservationStart',
        'reservationEnd',
        'roomNo'
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function payment(){
        return $this->hasOne(payment::class);
    }
}
