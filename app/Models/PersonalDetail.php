<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'mobile_number', 
        'dob',
        'civil_status',
        'citizenship',
        'address', 
        'province_code',
        'city_municipality_code',
        'source_of_fund',
        'image',
        'facebook_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'province_code');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_municipality_code', 'city_municipality_code');
    }
}
