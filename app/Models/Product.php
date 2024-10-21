<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','price','info'];
    protected $hidden = ['id','created_at','updated_at'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
