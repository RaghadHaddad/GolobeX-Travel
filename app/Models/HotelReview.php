<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'reviewText',
        'reviewDesc',
        'rating'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
