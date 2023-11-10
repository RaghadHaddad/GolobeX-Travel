<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model
{
    use HasFactory;

    public $primaryKey = ['hotel_id','user_id'];

    protected $fillable = [
        'hotel_id',
        'user_id',
        'reviewText',
        'reviewDesc',
        'rating'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
