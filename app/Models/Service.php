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

    ];

    public function flight(){
        return $this->belongsTo(Flight::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
