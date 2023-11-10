<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'paymentMethod',
        'paymentDate',
        'tax',
        'discount',
        'amount',
        'roomBook_id',
        'book_id'
    ];

    public function flightBooking(){
        return $this->belongsTo(FlightBooking::class,'book_id');
    }

    public function card(){
        return $this->belongsTo(Card::class);
    }

    public function roomBooking(){
        return $this->belongsTo(RoomBooking::class,'roomBook_id');
    }
}
