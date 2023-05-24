<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class upload extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'document_name',
        'file_ref',
        'description'
    ];  
}