<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'companyName',
        'companyImage',
        'averageReview',
        'like'
    ];

    public function flightReview(){
        return $this->hasMany(FlightReview::class);
    }

    public function flight(){
        return $this->hasMany(Flight::class);
    }
}
