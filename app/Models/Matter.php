<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use HasFactory;
    protected $fillable = [
        'matter_type','client_company','description','file_group',
        'control_account','pic','lawyer','task_assign','task_recipient',
        'file_ref','remark','status','purchaser_name','purchaser_company','vendor_name','vendor_copmany'
    ];
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
