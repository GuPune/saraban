<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    // use HasProfilePhoto;
    use Notifiable;
    // use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',     
        'Lastname',
        'email',
        'password',
        'Department',
        'role',
        'Prefix',
        'Agency',
        'Branch',
        'Image',
        'address',
        'Tel'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'two_factor_recovery_codes',
        // 'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function Prefix(){
        return $this->hasOne(Prefix::class,'Preid','prefix');
    }

    public function Agency(){
        return $this->hasOne(agency::class,'agency_name','Agency');
    }

    public function Branch(){
        return $this->hasOne(branch::class,'branche_name','Branch');
    }
    public function Department(){
        return $this->hasOne(Department::class,'Dpmname','Department');
    }
    public function level(){
        return $this->hasOne(level::class,'id','role');
    }
}

