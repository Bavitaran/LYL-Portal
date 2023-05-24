<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'date','due_date','invoice_to','item','cost','quantity',
        'price','description','sales_person','note','payment_method',
        'payment_terms','client_notes','payment_stub',
    ];
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
