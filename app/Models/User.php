<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roles_id',
        'fullname',
        'email',
        'password',
        'mobile_number',
        'company_name',
        'ic_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        //'mobile_number',
        //'ic_number',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function roles(){
        return $this->belongsTo(Role::class, 'roles_id');
    }
}
