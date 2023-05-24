<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class matteroverview extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

     protected $fillable =[
        'mattertypes_id',
        'open_file_date',
        'file_ref',
        'related_file_ref',
        'agency',
        'agent_name',
        'bank_detail',
        'contact',
        'client_id',
        'vendor_id',
        'purchaser_id',
        'developer_id',
        'financier_id',
        'property_id',
        'searches_id',
        'caveats_id',
        'agreement_id',
        'originaldoc_id',
    ];

    public function mattertypes()
    {
        return $this->belongsTo(Mattertypes::class, 'mattertypes_id');
    }
}