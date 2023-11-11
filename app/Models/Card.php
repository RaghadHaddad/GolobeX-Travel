<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'cardNumber',
        'expDate',
        'country',
        'payment_id',
        'cvc'
    ];

    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id');
    }
}
