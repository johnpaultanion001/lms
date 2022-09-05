<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = [
        'two_factor_expires_at',
    ];

    protected $fillable = [
        'social_id',
        'email',
        'provider', 
        'password',
        'reg_step',
        'status',
        'remarks',
        'two_factor_code',
        'two_factor_expires_at',
        'isSubmit',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function personal_detail()
    {
        return $this->belongsTo(PersonalDetail::class, 'id', 'user_id');
    }
    public function business_detail()
    {
        return $this->belongsTo(BusinessDetail::class, 'id', 'user_id');
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps = false; //Dont update the 'updated_at' field yet
        
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    /**
     * Reset the MFA code generated earlier
     */
    public function resetTwoFactorCode()
    {
        $this->timestamps = false; //Dont update the 'updated_at' field yet
        
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }


}
