<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'serviceName',
        'servicePrice',
        'flight_id',
        'hotel_id'

    ];

    public function flight(){
        return $this->belongsTo(Flight::class,'flight_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
