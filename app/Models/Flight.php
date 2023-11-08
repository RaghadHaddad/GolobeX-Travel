<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $fillable = [
        'fromPlace',
        'toPlace',
        'fromTime',
        'toTime',
        'planName',
        'price',
        'imagePlace',
        'duration',
        'road'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function flightBooking(){
        return $this->hasMany(FlightBooking::class);
    }

    public function service(){
        return $this->hasMany(Service::class);
    }

}
