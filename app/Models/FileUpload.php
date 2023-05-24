<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'description',
        'document_name'
    ];
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
