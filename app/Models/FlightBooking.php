<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'flight_id',
        'bookDate',
        'numberOfPassenegers',
        'class',
        'seatNo',
        'gate'
    ];

    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function flight(){
        return $this->belongsTo(Flight::class,'flight_id');
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
