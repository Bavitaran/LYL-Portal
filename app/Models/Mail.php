<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    protected $fillable = [
        'date','despatch','ref_no','recipient_add',
        'description','total_amount','incoming','paid_amount','due_date',
        'outgoing_date','pic'
    ];
}
