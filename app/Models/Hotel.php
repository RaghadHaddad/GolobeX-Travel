<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotelName',
        'hotelImage',
        'location',
        'hotelType',
        'averageReview',
        'rating',
        'description',
        'like'
    ];

    public function service(){
        return $this->hasMany(Service::class);
    }

    public function room(){
        return $this->hasMany(Room::class);
    }

    public function hotelReview(){
        return $this->hasMany(HotelReview::class);
    }

    public function features(){
        return $this->hasMany(Features::class);
    }
}
