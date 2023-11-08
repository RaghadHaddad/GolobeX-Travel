<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
    protected $fillable = [
        'featuresName'
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
