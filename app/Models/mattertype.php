<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class mattertype extends Model
{
    use HasFactory, HasApiTokens;

    public function matteroverview()
    {
        return $this->hasMany(Matteroverview::class, 'mattertype_id');
    }
}