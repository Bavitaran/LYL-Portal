<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class UserRole extends Model
{
    use HasApiTokens, HasFactory;

    public function role()
    {
        return $this-> belongsTo(Role::class, 'roles_id', 'id');
         
    }
}