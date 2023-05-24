<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class userdetail extends Model
{
    //use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'role',
        'register_date',
        'fullname',
        'new_nric',
        'passport_no',
        'gender',
        'nationality',
        'company_name',
        'company_reg_new_no',
        'company_reg_old_no',
        'registration_add',
        'business_add',
        'person_in_charge',
        'primary_mobile_no',
        'primary_social_contact_no',
        'primary_email',
        'primary_add_line_1',
        'primary_add_line_2',
        'primary_add_line_3',
        'primary_add_state',
        'primary_add_postcode',
        'primary_add_country',
        'secondary_mobile_no',
        'secondary_social_contact_no',
        'secondary_email',
        'secondary_add_line_1',
        'secondary_add_line_2',
        'secondary_add_line_3',
        'secondary_add_state',
        'secondary_add_postcode',
        'secondary_add_country',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}

