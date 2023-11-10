<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightReview extends Model
{
    use HasFactory;

    public $primaryKey = ['user_id', 'company_id'];

    protected $fillable = [
        'user_id',
        'company_id',
        'reviewText',
        'reviewDesc',
        'rating'
    ];

    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }
}
