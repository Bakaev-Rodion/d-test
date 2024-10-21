<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    const ROLE_ADMIN = 1;
    const ROLE_TEAMLEAD = 2;
    const ROLE_BUYER = 3;
    protected $fillable = ['name'];

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }
}
