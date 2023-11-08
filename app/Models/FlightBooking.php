<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookDate',
        'numberOfPassenegers',
        'class',
        'seatNo',
        'gate'
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function flight(){
        return $this->belongsTo(Flight::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
