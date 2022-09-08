<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_industry',
        'business_name', 
        'business_address',
        'business_phone',
        'business_province_code',
        'business_city_municipality_code',
        'business_permit',
        'business_phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'business_province_code', 'province_code');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'business_city_municipality_code', 'city_municipality_code');
    }
}
